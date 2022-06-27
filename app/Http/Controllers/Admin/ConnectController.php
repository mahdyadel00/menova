<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConnectRequest;
use App\Models\Connect;
use App\Models\ConnectTranslation;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ConnectController extends Controller
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
        return view('admin.connects.index');
    } // end of index

    protected function data()
    {
        $connects = Connect::orderBy('id' , 'desc')->get();

        return DataTables::of($connects)
            ->addColumn('record_select', 'admin.connects.data_table.record_select')
            ->addColumn('title', function($connects){
               
                return $connects->data->isNotEmpty()? $connects->data->first()->title : '';
            })
            ->addColumn('description', function($connects){
               
                return $connects->data->isNotEmpty()? $connects->data->first()->description : '';
            })
                ->addColumn('image', function ($connects) {
                   
                    $url = asset(rawurlencode($connects->image));
                    return '<img src=' . $connects->image_path . ' border="0" style=" width: 80px; height: 80px;" class="img-responsive img-rounded" align="center" />';
                })
                ->editColumn('published', function ($connects) {
                    if ($connects->published == '0') {

                        return `<div class="badge badge-warning">` . __('connects.not_published') . `</div>`;
                    } else {
                        return `<div class="badge badge-info">` . __('Published') . `</div>`;
                    }
                })
            ->editColumn('created_at', function (Connect $connects) {
                return $connects->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.connects.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'title' , 'description' , 'image'])
            ->toJson();
    } // end of data

    protected function create()
    {
        return view('admin.connects.create');
    } // end of create

    protected function store(ConnectRequest $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'description' => $request->input($locale . '_description'),
            ];
        }
     
        if($request->published == 'on'){

            $data['published'] = '1' ;

        }else{
            $data['published'] = '0' ;
        }


        if ($request->image) {
            $data['image'] = $this->uploadImage($request->image, 'connects');
        }

        Connect::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.connects.index');
    } // end of store

    protected function edit( $id)
    {
        $connect = Connect::findOrFail($id);
            return view('admin.connects.edit', compact('connect'));
    } // end of edit

    protected function update(ConnectRequest $request,$id)
    {
        $connects = Connect::where('id' , $id)->first();
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'description' => $request->input($locale . '_description'),
            ];
        }
            $data['published'] = $request->published ?? 0 ;

        if ($request->image) {
            if ($connects->image) {
                $this->deleteImage($connects->image, 'connects');
            }
            $data['image'] = $this->uploadImage($request->image, 'connects');
        }
        $connects->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.connects.index');
    } // end of update

    protected function destroy($id)
    {
        $connects = Connect::where('id' , $id)->first();
        
        $connects->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $connects = Connect::FindOrFail($recordId);
            $this->delete($connects);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Request $request , $id)
    {
        $connects = Connect::where('id' , $id)->first();
        if ($connects->image) {
            $this->deleteImage($connects->image, 'connects');
        }
        $connects->delete();
    } // end of delete

}//end of controller