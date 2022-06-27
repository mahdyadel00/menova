<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\OurClientRequest;
use App\Models\OurClient;
use Yajra\DataTables\DataTables;
use App\Traits\UploadImage;


class OurClientController extends Controller
{
    use UploadImage;
    protected function index(){

        return view('admin.our_clients.index');
    }

    protected function data()
    {
        $our_clients = OurClient::orderBy('id' , 'desc')->get();

        return DataTables::of($our_clients)
            ->addColumn('record_select', 'admin.our_clients.data_table.record_select')
           
                ->addColumn('image', function ($our_clients) {
                   
                    $url = asset(rawurlencode($our_clients->image));
                    return '<img src=' . $our_clients->image_path . ' border="0" style=" width: 80px; height: 80px;" class="img-responsive img-rounded" align="center" />';
                })
                ->editColumn('published', function ($our_clients) {
                    if ($our_clients->published == '0') {

                        return `<div class="badge badge-warning">` . __('our_clients.not_published') . `</div>`;
                    } else {
                        return `<div class="badge badge-info">` . __('Published') . `</div>`;
                    }
                })
            ->editColumn('created_at', function (OurClient $our_client) {
                return $our_client->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.our_clients.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'image'])
            ->toJson();
    } // end of data

    protected function create()
    {
        return view('admin.our_clients.create');
    } // end of create

    protected function store(Request $request)
    {
        
        if($request->published == 'on'){

            $data['published'] = '1' ;

        }else{
            $data['published'] = '0' ;
        }

        if ($request->image) {
            $data['image'] = $this->uploadImage($request->image, 'our_clients');
        }

        OurClient::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.our_clients.index');
    } // end of store

    protected function edit(Request $request , $id)
    {
        $our_client = OurClient::findOrFail($id);
            return view('admin.our_clients.edit', compact('our_client'));
    } // end of edit

    protected function update(OurClientRequest $request, $id)
    {
      
        $data = [];
        $our_client = OurClient::where('id' , $id)->first();
       
        $data['published'] = $request->published ?? 0 ;

        if ($request->image) {
            if ($our_client->image) {
                $this->deleteImage($our_client->image, 'our_clients');
            }
            $data['image'] = $this->uploadImage($request->image, 'our_clients');
        }

        $our_client->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.our_clients.index');
    } // end of update

    protected function destroy(Request $request ,  $id)
    { 
         $our_client = OurClient::findorFail($id);      

            $our_client->delete();
            session()->flash('success', __('site.deleted_successfully'));
            return response(__('site.deleted_successfully'));
     
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $our_client = OurClient::FindOrFail($recordId);
            $this->delete($our_client);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Request $request ,  $id)
    {
        $our_client = OurClient::where('id' , $id)->first();

        if ($our_client->image) {
            $this->deleteImage($our_client->image, 'our_clients');
        }
        $our_client->delete();
    } // end of delete
}
