<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServicesRequest;
use App\Models\Services;
use App\Models\ServicesTranslation;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ServicesController extends Controller
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
        return view('admin.services.index');
    } // end of index

    protected function data()
    {
        $services = services::with([
            'data' => function($query){

                $query->where('locale' , app()->getLocale());
            },
            ])->orderBy('id' , 'desc')->get();

        return DataTables::of($services)
            ->addColumn('record_select', 'admin.services.data_table.record_select')
            ->addColumn('name', function($services){

                return $services->data->isNotEmpty()? $services->data->first()->name : '';
            })
            ->addColumn('description', function($services){

                return $services->data->isNotEmpty()? $services->data->first()->description : '';
            })
                ->addColumn('image', function ($services) {

                    $url = asset(rawurlencode($services->image));
                    return '<img src=' . $services->image_path . ' border="0" style=" width: 80px; height: 80px;" class="img-responsive img-rounded" align="center" />';
                })
                ->editColumn('published', function ($services) {
                    if ($services->published == '0') {

                        return `<div class="badge badge-warning">` . __('services.not_published') . `</div>`;
                    } else {
                        return `<div class="badge badge-info">` . __('Published') . `</div>`;
                    }
                })
            ->editColumn('created_at', function (Services $services) {
                return $services->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.services.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'name' , 'description' , 'image'])
            ->toJson();
    } // end of data

    protected function create()
    {
        return view('admin.services.create');
    } // end of create

    protected function store(ServicesRequest $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name'),
                'description' => $request->input($locale . '_description'),
            ];
        }
        if($request->icon){

            $data['icon']   = $request->icon;
        }
        // dd($request->all());
        if($request->published == 'on'){

            $data['published'] = '1' ;

        }else{
            $data['published'] = '0' ;
        }


        if ($request->image) {
            $data['image'] = $this->uploadImage($request->image, 'services');
        }

        Services::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.services.index');
    } // end of store

    protected function edit( $id)
    {
        $services = Services::findOrFail($id);
            return view('admin.services.edit', compact('services'));
    } // end of edit

    protected function update(ServicesRequest $request,$id)
    {
        $services = Services::where('id' , $id)->first();
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name'),
                'description' => $request->input($locale . '_description'),
            ];
        }
            $data['published'] = $request->published ?? 0 ;
            $data['icon'] = $request->icon ;

        if ($request->image) {
            if ($services->image) {
                $this->deleteImage($services->image, 'services');
            }
            $data['image'] = $this->uploadImage($request->image, 'services');
        }
        $services->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.services.index');
    } // end of update

    protected function destroy($id)
    {
        $services = Services::where('id' , $id)->first();
        $this->delete($services);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $services = Services::FindOrFail($recordId);
            $this->delete($services);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Services $services)
    {
        if ($services->image) {
            $this->deleteImage($services->image, 'services');
        }
        $services->delete();
    } // end of delete

}//end of controller
