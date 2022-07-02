<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rais;
use App\Http\Requests\Admin\RaisRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class RaisController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:read_services')->only(['index']);
    //     $this->middleware('permission:create_services')->only(['create', 'store']);
    //     $this->middleware('permission:read_services')->only(['show']);
    //     $this->middleware('permission:update_services')->only(['edit', 'update']);
    //     $this->middleware('permission:delete_services')->only(['delete', 'bulk_delete']);
    // } // end of __construct

    protected function index()
    {
        return view('admin.rais.index');
    } // end of index

    protected function data()
    {
        $rais = Rais::with('data')->orderBy('id', 'desc')->get();
        return DataTables::of($rais)
            ->addColumn('record_select', 'admin.rais.data_table.record_select')

            ->addColumn('title', function ($rais) {

                return $rais->data->isNotEmpty() ?  $rais->data->first()->title : '';
            })
            ->editColumn('published', function ($rais) {
                if ($rais->published == '0') {

                    return `<div class="badge badge-warning">` . __('rais.not_published') . `</div>`;
                } else {
                    return `<div class="badge badge-info">` . __('Published') . `</div>`;
                }
            })
            ->editColumn('icon', function ($rais) {

                return `<div class="badge badge-info"><i class = `. $rais->icon .`></i></div>`;
            })
            ->editColumn('created_at', function (Rais $rais) {
                return $rais->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.rais.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'title', 'email', 'stage_of_business', 'describe'])
            ->toJson();
    } // end of data

    protected function create()
    {
        return view('admin.rais.create');
    } // end of create

    protected function store(RaisRequest $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'description' => $request->input($locale . '_description'),
            ];
        }
        if ($request->icon) {

            $data['icon']   = $request['icon'];
        }
        if ($request->published == 'on') {

            $data['published'] = '1';
        } else {
            $data['published'] = '0';
        }
        // dd($data);
        // Rais::create($data);
        Rais::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.rais.index');
    } // end of store

    protected function edit($id)
    {
        $rais = Rais::findOrFail($id);
        return view('admin.rais.edit', compact('rais'));
    } // end of edit

    protected function update(RaisRequest $request, $id)
    {
        $rais = Rais::where('id', $id)->first();
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'description' => $request->input($locale . '_description'),
            ];
        }
        $data['published'] = $request->published ?? 0;
        $data['icon'] = $request->icon;

        $rais->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.rais.index');
    } // end of update

    protected function destroy($id)
    {
        $rais = Rais::where('id', $id)->first();
        $this->delete($rais);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $rais = Rais::FindOrFail($recordId);
            $this->delete($rais);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Rais $rais)
    {
        if ($rais->image) {
            $this->deleteImage($rais->image, 'rais');
        }
        $rais->delete();
    } // end of delete



}//end of controller
