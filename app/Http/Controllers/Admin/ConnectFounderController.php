<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConnectFounder;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ConnectFounderController extends Controller
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
        return view('admin.connect_founder.index');
    } // end of index

    protected function data()
    {
        $for_fund = ConnectFounder::orderBy('id', 'desc')->get();
        return DataTables::of($for_fund)
            ->addColumn('record_select', 'admin.for_fund.data_table.record_select')
            ->editColumn('created_at', function (ConnectFounder $for_fund) {
                return $for_fund->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.connect_founder.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'title', 'email', 'stage_business', 'description'])
            ->toJson();
    } // end of data

}//end of controller
