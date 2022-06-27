<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvisorRequest;
use App\Models\Advisor;
use App\Models\AdvisorTranslation;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class AdvisorController extends Controller
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
        return view('admin.advisors.index');
    } // end of index

    protected function data()
    {
        $advisors = Advisor::orderBy('id' , 'desc')->get();

        return DataTables::of($advisors)
            ->addColumn('record_select', 'admin.advisors.data_table.record_select')
            ->addColumn('title', function($advisors){
               
                return $advisors->data->isNotEmpty()? $advisors->data->first()->title : '';
            })
            ->addColumn('description', function($advisors){
               
                return $advisors->data->isNotEmpty()? $advisors->data->first()->description : '';
            })
                ->addColumn('image', function ($advisors) {
                   
                    $url = asset(rawurlencode($advisors->image));
                    return '<img src=' . $advisors->image_path . ' border="0" style=" width: 80px; height: 80px;" class="img-responsive img-rounded" align="center" />';
                })
                ->editColumn('published', function ($advisors) {
                    if ($advisors->published == '0') {

                        return `<div class="badge badge-warning">` . __('advisors.not_published') . `</div>`;
                    } else {
                        return `<div class="badge badge-info">` . __('Published') . `</div>`;
                    }
                })
            ->editColumn('created_at', function (Advisor $advisors) {
                return $advisors->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.advisors.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'title' , 'description' , 'image'])
            ->toJson();
    } // end of data

    protected function create()
    {
        return view('admin.advisors.create');
    } // end of create

    protected function store(AdvisorRequest $request)
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
            $data['image'] = $this->uploadImage($request->image, 'advisors');
        }

        Advisor::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.advisors.index');
    } // end of store

    protected function edit( $id)
    {
        $advisor = Advisor::findOrFail($id);
            return view('admin.advisors.edit', compact('advisor'));
    } // end of edit

    protected function update(AdvisorRequest $request,$id)
    {
        $advisors = Advisor::where('id' , $id)->first();
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'description' => $request->input($locale . '_description'),
            ];
        }
            $data['published'] = $request->published ?? 0 ;

        if ($request->image) {
            if ($advisors->image) {
                $this->deleteImage($advisors->image, 'advisors');
            }
            $data['image'] = $this->uploadImage($request->image, 'advisors');
        }
        $advisors->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.advisors.index');
    } // end of update

    protected function destroy($id)
    {
        $advisors = Advisor::where('id' , $id)->first();
        
        $advisors->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $advisors = Advisor::FindOrFail($recordId);
            $this->delete($advisors);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Request $request , $id)
    {
        $advisors = Advisor::where('id' , $id)->first();
        if ($advisors->image) {
            $this->deleteImage($advisors->image, 'advisors$advisors');
        }
        $advisors->delete();
    } // end of delete

}//end of controller