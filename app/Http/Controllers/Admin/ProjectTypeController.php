<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectTypeRequest;
use App\Models\ProjectType;
use Yajra\DataTables\Facades\DataTables;

class ProjectTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_projects_types')->only(['index']);
        $this->middleware('permission:create_projects_types')->only(['create', 'store']);
        $this->middleware('permission:update_projects_types')->only(['edit', 'update']);
        $this->middleware('permission:delete_projects_types')->only(['delete', 'bulk_delete']);
    } // end of __construct

    public function index()
    {
        return view('admin.projects_types.index');
    } // end of index

    public function data()
    {
        $projects_types = ProjectType::select();

        return DataTables::of($projects_types)
            ->addColumn('record_select', 'admin.projects_types.data_table.record_select')
            ->editColumn('created_at', function (ProjectType $type) {
                return $type->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.projects_types.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->toJson();
    } // end of data

    public function create()
    {
        return view('admin.projects_types.create');
    } // end of create

    public function store(ProjectTypeRequest $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name')
            ];
        }
        ProjectType::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.project-types.index');
    } // end of store

    public function show(ProjectType $project_type)
    {
        return redirect()->route('admin.project-types.index');
    } // end of show

    public function edit(ProjectType $project_type)
    {
        return view('admin.projects_types.edit', compact('project_type'));
    } // end of edit

    public function update(ProjectTypeRequest $request, ProjectType $project_type)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name')
            ];
        }
        $project_type->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.project-types.index');
    } // end of update

    public function destroy(ProjectType $project_type)
    {
        $this->delete($project_type);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $project_type = ProjectType::FindOrFail($recordId);
            $this->delete($project_type);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(ProjectType $project_type)
    {
        $project_type->delete();
    } // end of delete

}//end of controller