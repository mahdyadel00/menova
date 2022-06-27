<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rais;
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
        $rais = Rais::orderBy('id' , 'desc')->get();
        dd($rais);
        return DataTables::of($rais)
            ->addColumn('record_select', 'admin.rais.data_table.record_select')
            ->addColumn('name', function($rais){
               
                return $rais->name ;
            })
            ->addColumn('email', function($rais){
               
                return $rais->email;
            })
            ->addColumn('stage_of_business', function($rais){
               
                return $rais->stage_of_business;
            })
            ->addColumn('describe', function($rais){
               
                return $rais->describe;
            })
            ->editColumn('created_at', function (Connect $rais) {
                return $rais->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.rais.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'title' , 'email' , 'stage_of_business' , 'describe'])
            ->toJson();
    } // end of data

}//end of controller