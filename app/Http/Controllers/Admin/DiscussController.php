<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscussRequest;
use App\Mail\ApproveDiscussMail;
use App\Mail\RejectDiscussMail;
use App\Models\Discuss;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class DiscussController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_discuss')->only(['index']);
        $this->middleware('permission:create_discuss')->only(['create', 'store']);
        $this->middleware('permission:read_discuss')->only(['show']);
        $this->middleware('permission:update_discuss')->only(['edit', 'update']);
        $this->middleware('permission:delete_discuss')->only(['delete', 'bulk_delete']);
    } // end of __construct

    public function index()
    {
        return view('admin.discusses.index');
    } // end of index

    public function data()
    {
        $discusses = Discuss::with(['topic', 'user'])->select();

        return DataTables::of($discusses)
            ->addColumn('record_select', 'admin.discusses.data_table.record_select')
            ->addColumn('status', 'admin.discusses.data_table.status')
            ->editColumn('title', function (Discuss $discuss) {
                return '<a href="' . route('admin.discusses.show', $discuss->id) . '">' . $discuss->title . '</a>';
            })
            ->editColumn('topic', function (Discuss $discuss) {
                return $discuss->topic->name;
            })
            ->editColumn('user', function (Discuss $discuss) {
                return $discuss->user->full_name;
            })
            ->editColumn('created_at', function (Discuss $discuss) {
                return $discuss->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.discusses.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'status', 'title'])
            ->toJson();
    } // end of data

    public function create()
    {
        $topics = Topic::all();
        return view('admin.discusses.create', compact('topics'));
    } // end of create

    public function store(DiscussRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Discuss::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.discusses.index');
    } // end of store

    public function show(Discuss $discuss)
    {
        return view('admin.discusses.show', compact('discuss'));
    } // end of show

    public function edit(Discuss $discuss)
    {
        $topics = Topic::all();
        return view('admin.discusses.edit', compact('discuss', 'topics'));
    } // end of edit

    public function update(DiscussRequest $request, Discuss $discuss)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $discuss->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.discusses.index');
    } // end of update

    public function destroy(Discuss $discuss)
    {
        $this->delete($discuss);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $discuss = Discuss::FindOrFail($recordId);
            $this->delete($discuss);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Discuss $discuss)
    {

        $discuss->delete();
    } // end of delete

    public function changeStatus(Request $request, Discuss $discuss)
    {
        $discuss->update([
            'published' => !$discuss->published
        ]);

        if ($discuss->published) {
            Mail::to($discuss->user->email)->send(new ApproveDiscussMail(['discuss' => $discuss]));
        } else {
            Mail::to($discuss->user->email)->send(new RejectDiscussMail(['discuss' => $discuss]));
        }

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.discusses.index');
    } // end of change status

}//end of controller