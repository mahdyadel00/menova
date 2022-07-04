<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountersRequest;
use App\Models\Counter;
use App\Models\CounterTranslation;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    use UploadImage;

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
        return view('admin.counters.index');
    } // end of index

    protected function data()
    {
        $counters = Counter::orderBy('id', 'desc')->get();

        return DataTables::of($counters)
            ->addColumn('record_select', 'admin.counters.data_table.record_select')
            ->addColumn('title', function ($counters) {

                return $counters->data->isNotEmpty() ? $counters->data->first()->title : '';
            })
            ->addColumn('description', function ($counters) {

                return $counters->data->isNotEmpty() ? $counters->data->first()->description : '';
            })->editColumn('icon', function ($counters) {

                return `<div class="badge badge-info"><i class = ` . $counters->icon . `></i></div>`;

            })->editColumn('published', function ($counters) {
                if ($counters->published == '0') {

                    return `<div class="badge badge-warning">` . __('counters.not_published') . `</div>`;
                } else {
                    return `<div class="badge badge-info">` . __('Published') . `</div>`;
                }
            })->editColumn('counter', function ($counters) {

                return $counters->counter;
            })
            ->editColumn('created_at', function (Counter $counters) {
                return $counters->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.counters.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'title', 'description', 'image'])
            ->toJson();
    } // end of data

    protected function create()
    {
        return view('admin.counters.create');
    } // end of create

    protected function store(CountersRequest $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'description' => $request->input($locale . '_description'),
            ];
        }

        if ($request->published == 'on') {

            $data['published'] = '1';
        } else {
            $data['published'] = '0';
        }
        if ($request->counter) {

            $data['counter']   = $request['counter'];
        }
        if ($request->icon) {

            $data['icon']   = $request['icon'];
        }

        Counter::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.counters.index');
    } // end of store

    protected function edit($id)
    {
        $counter = Counter::findOrFail($id);
        return view('admin.counters.edit', compact('counter'));
    } // end of edit

    protected function update(CountersRequest $request, $id)
    {
        $counters = Counter::where('id', $id)->first();
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'description' => $request->input($locale . '_description'),
            ];
        }
        $data['published'] = $request->published ?? 0;
        $data['counter'] = $request->counter;
        $data['icon'] = $request->icon;

        $counters->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.counters.index');
    } // end of update

    protected function destroy($id)
    {
        $counters = Counter::where('id', $id)->first();

        $counters->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $counter = Counter::FindOrFail($recordId);
            $this->delete($counter);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Request $request, $id)
    {
        $counters = Counter::where('id', $id)->first();
        if ($counters->image) {
            $this->deleteImage($counters->image, 'counters$counters');
        }
        $counters->delete();
    } // end of delete

}//end of controller
