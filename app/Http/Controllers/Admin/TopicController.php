<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_topics')->only(['index']);
        $this->middleware('permission:create_topics')->only(['create', 'store']);
        $this->middleware('permission:update_topics')->only(['edit', 'update']);
        $this->middleware('permission:delete_topics')->only(['delete', 'bulk_delete']);
    } // end of __construct

    public function index()
    {
        return view('admin.topics.index');
    } // end of index

    public function data()
    {
        $topics = Topic::select();

        return DataTables::of($topics)
            ->addColumn('record_select', 'admin.topics.data_table.record_select')
            ->editColumn('created_at', function (Topic $topic) {
                return $topic->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.topics.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->toJson();
    } // end of data

    public function create()
    {
        return view('admin.topics.create');
    } // end of create

    public function store(TopicRequest $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name')
            ];
        }
        Topic::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.topics.index');
    } // end of store

    public function show(Topic $topic)
    {
        return redirect()->route('admin.topics.index');
    } // end of show

    public function edit(Topic $topic)
    {
        return view('admin.topics.edit', compact('topic'));
    } // end of edit

    public function update(TopicRequest $request, Topic $topic)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name')
            ];
        }
        $topic->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.topics.index');
    } // end of update

    public function destroy(Topic $topic)
    {
        $this->delete($topic);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $topic = Topic::FindOrFail($recordId);
            $this->delete($topic);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Topic $topic)
    {
        $topic->delete();
    } // end of delete

}//end of controller