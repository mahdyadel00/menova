<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUsRequest;
use App\Models\AboutUs;
use App\Models\AboutUsTranslation;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class AboutUsController extends Controller
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
        return view('admin.about_us.index');
    } // end of index

    protected function data()
    {
        $about_us = AboutUs::orderBy('id' , 'desc')->get();

        return DataTables::of($about_us)
            ->addColumn('record_select', 'admin.services.data_table.record_select')
            ->addColumn('title', function($about_us){
               
                return $about_us->data->isNotEmpty()? $about_us->data->first()->title : '';
            })
            ->addColumn('description', function($about_us){
               
                return $about_us->data->isNotEmpty()? $about_us->data->first()->description : '';
            })
                ->addColumn('image', function ($about_us) {
                   
                    $url = asset(rawurlencode($about_us->image));
                    return '<img src=' . $about_us->image_path . ' border="0" style=" width: 80px; height: 80px;" class="img-responsive img-rounded" align="center" />';
                })
                ->editColumn('published', function ($about_us) {
                    if ($about_us->published == '0') {

                        return `<div class="badge badge-warning">` . __('about_us.not_published') . `</div>`;
                    } else {
                        return `<div class="badge badge-info">` . __('Published') . `</div>`;
                    }
                })
            ->editColumn('created_at', function (AboutUs $about_us) {
                return $about_us->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.about_us.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'title' , 'description' , 'image'])
            ->toJson();
    } // end of data

    protected function create()
    {
        return view('admin.about_us.create');
    } // end of create

    protected function store(AboutUsRequest $request)
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
            $data['image'] = $this->uploadImage($request->image, 'about_us');
        }

        AboutUs::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.about_us.index');
    } // end of store

    protected function edit( $id)
    {
        $about_us = AboutUs::findOrFail($id);
            return view('admin.about_us.edit', compact('about_us'));
    } // end of edit

    protected function update(AboutUsRequest $request,$id)
    {
        $about_us = AboutUs::where('id' , $id)->first();
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'description' => $request->input($locale . '_description'),
            ];
        }
            $data['published'] = $request->published ?? 0 ;

        if ($request->image) {
            if ($about_us->image) {
                $this->deleteImage($about_us->image, 'about_us');
            }
            $data['image'] = $this->uploadImage($request->image, 'about_us');
        }
        $about_us->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.about_us.index');
    } // end of update

    protected function destroy($id)
    {
        $about_us = AboutUs::where('id' , $id)->first();
        
        $about_us->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $about_us = AboutUs::FindOrFail($recordId);
            $this->delete($about_us);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Request $request , $id)
    {
        $about_us = AboutUs::where('id' , $id)->first();
        if ($about_us->image) {
            $this->deleteImage($about_us->image, 'about_us');
        }
        $about_us->delete();
    } // end of delete

}//end of controller