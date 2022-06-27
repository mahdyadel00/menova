<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use App\Models\SliderData;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use UploadImage;

    // public function __construct()
    // {
    //     $this->middleware('permission:read_sliders')->only(['index']);
    //     $this->middleware('permission:create_sliders')->only(['create', 'store']);
    //     $this->middleware('permission:read_sliders')->only(['show']);
    //     $this->middleware('permission:update_sliders')->only(['edit', 'update']);
    //     $this->middleware('permission:delete_sliders')->only(['delete', 'bulk_delete']);
    // } // end of __construct

    public function index()
    {
        return view('admin.sliders.index');
    } // end of index

    protected function data()
    {
        $sliders = Slider::orderBy('id' , 'desc')->get();

        return DataTables::of($sliders)
            ->addColumn('record_select', 'admin.sliders.data_table.record_select')
            ->addColumn('name', function($sliders){
               
                return $sliders->data->isNotEmpty()? $sliders->data->first()->name : '';
            })
            ->addColumn('description', function($sliders){
               
                return $sliders->data->isNotEmpty()? $sliders->data->first()->description : '';
            })
                ->addColumn('image', function ($sliders) {
                   
                    $url = asset(rawurlencode($sliders->image));
                    return '<img src=' . $sliders->image_path . ' border="0" style=" width: 80px; height: 80px;" class="img-responsive img-rounded" align="center" />';
                })
                ->editColumn('published', function ($sliders) {
                    if ($sliders->published == '0') {

                        return `<div class="badge badge-warning">` . __('sliders.not_published') . `</div>`;
                    } else {
                        return `<div class="badge badge-info">` . __('Published') . `</div>`;
                    }
                })
            ->editColumn('created_at', function (Slider $slider) {
                return $slider->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.sliders.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'name' , 'description' , 'image'])
            ->toJson();
    } // end of data

    protected function create()
    {
        return view('admin.sliders.create');
    } // end of create

    protected function store(SliderRequest $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name'),
                'description' => $request->input($locale . '_description'),
            ];
        }
        if($request->published == 'on'){

            $data['published'] = '1' ;

        }else{
            $data['published'] = '0' ;
        }

        if ($request->image) {
            $data['image'] = $this->uploadImage($request->image, 'sliders');
        }

        Slider::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.sliders.index');
    } // end of store

    protected function edit(Slider $slider)
    {
            return view('admin.sliders.edit', compact('slider'));
    } // end of edit

    protected function update(SliderRequest $request, Slider $slider)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name'),
                'description' => $request->input($locale . '_description'),
            ];
        }
      
            $data['published'] = $request->published ;

        if ($request->image) {
            if ($slider->image) {
                $this->deleteImage($slider->image, 'sliders');
            }
            $data['image'] = $this->uploadImage($request->image, 'sliders');
        }

        $slider->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.sliders.index');
    } // end of update

    protected function destroy(Slider $slider)
    {
        $this->delete($slider);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $slider = Slider::FindOrFail($recordId);
            $this->delete($slider);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Slider $slider)
    {
        if ($slider->image) {
            $this->deleteImage($slider->image, 'sliders');
        }
        $slider->delete();
    } // end of delete

}//end of controller