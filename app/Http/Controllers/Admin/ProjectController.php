<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Domain;
use App\Models\Project;
use App\Models\ProjectType;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    use UploadImage;

    public function __construct()
    {
        $this->middleware('permission:read_projects')->only(['index']);
        $this->middleware('permission:create_projects')->only(['create', 'store']);
        $this->middleware('permission:read_projects')->only(['show']);
        $this->middleware('permission:update_projects')->only(['edit', 'update']);
        $this->middleware('permission:delete_projects')->only(['delete', 'bulk_delete']);
    } // end of __construct

    public function index()
    {
        return view('admin.projects.index');
    } // end of index

    public function data()
    {
        $projects = Project::with(['domain', 'projectType'])->select();

        return DataTables::of($projects)
            ->addColumn('record_select', 'admin.projects.data_table.record_select')
            ->editColumn('domain', function (Project $project) {
                return $project->domain->name;
            })
            ->editColumn('project_type', function (Project $project) {
                return $project->projectType->name;
            })
            ->editColumn('created_at', function (Project $project) {
                return $project->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.projects.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->toJson();
    } // end of data

    public function create()
    {
        $projectTypes = ProjectType::all();
        $domains = Domain::all();
        return view('admin.projects.create', compact('projectTypes', 'domains'));
    } // end of create

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        if ($request->image) {
            $data['image'] = $this->uploadImage($request->image, 'projects');
        }
        if ($request->attachment) {
            $data['attachment'] = $this->uploadDocument($request->attachment, 'projects');
        }
        Project::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.projects.index');
    } // end of store

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    } // end of show

    public function edit(Project $project)
    {
        $projectTypes = ProjectType::all();
        $domains = Domain::all();
        return view('admin.projects.edit', compact('project', 'domains', 'projectTypes'));
    } // end of edit

    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if ($request->image) {
            if ($project->hasImage()) {
                $this->deleteImage($project->image, 'projects');
            }
            $data['image'] = $this->uploadImage($request->image, 'projects');
        }
        if ($request->attachment) {
            if ($project->hasDocument()) {
                $this->deleteDocument($project->attachment, 'projects');
            }
            $data['attachment'] = $this->uploadDocument($request->attachment, 'projects');
        }

        $project->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.projects.index');
    } // end of update

    public function destroy(Project $project)
    {
        $this->delete($project);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $project = Project::FindOrFail($recordId);
            $this->delete($project);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Project $project)
    {
        if ($project->hasImage()) {
            $this->deleteImage($project->image, 'projects');
        }
        if ($project->hasDocument()) {
            $this->deleteDocument($project->attachment, 'projects');
        }

        $project->delete();
    } // end of delete

}//end of controller