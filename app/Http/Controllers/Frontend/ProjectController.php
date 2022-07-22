<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProjectRequest;
use App\Models\Domain;
use App\Models\Project;
use App\Models\ProjectType;
use App\Providers\AppServiceProvider;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    use UploadImage;

    public function __construct()
    {
        // $this->middleware('permission:read_projects')->only(['index']);
        // $this->middleware('permission:create_projects')->only(['create', 'store']);
        // $this->middleware('permission:read_projects')->only(['show']);
        // $this->middleware('permission:update_projects')->only(['edit', 'update']);
    } // end of __construct

    public function index(Request $request)
    {
        $currentUser = auth()->user();
        $domains = Domain::get();
        $project_type = ProjectType::get();
        $projects = Project::where('user_id', $currentUser->id)
            ->with('user')
            ->paginate(AppServiceProvider::PAGINATION_LIMIT);

        return view('frontend.projects.my-projects', compact('projects' , 'domains' , 'project_type'));
    } //end of index

    protected function store(ProjectRequest $request)
    {
        $validate = $request->validated();
        if ($request->file) {
            $type = explode('/', $request->file->getMimeType())[0];
            if ($type == 'image') {
                $validate['image'] = $this->uploadImage($request->file, 'projects');
            } else {
                $validate['attachment'] = $this->uploadDocument($request->file, 'projects');
            }
        }
        $validate['user_id'] = auth()->id();
        try {
            Project::create($validate);
            session()->flash('success', __('site.added_successfully'));
            return redirect()->route('frontend.projects.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('site.server_error'));
            return redirect()->route('frontend.projects.index');
        }
    } //end of store

    protected function show(Request $request , $id)
    {   
        $domains = Domain::get();
        $project_type = ProjectType::get();
        $projects = Project::where('user_id', $id)
            ->with('user')
            ->paginate(AppServiceProvider::PAGINATION_LIMIT);

        return view('frontend.projects.show', compact('projects' , 'domains' , 'project_type'));
    }

    protected function details(Request $request , $id){

        $project = Project::where('id' , $id)->first();
        // dd($project->domain_id;
        $domain = Domain::with('data')->where('id' , $project->domain_id)->first();
        // dd($domain);
        $project_type = ProjectType::with('data')->where('id' , $project->project_type_id)->first();

        // dd($project_type);
        return view('frontend.projects.details' , compact('project' , 'project_type' , 'domain'));
    }

    protected function getProjectData(Request $request)
    {
        $project = Project::findOrFail($request->id);

        if (auth()->user()->id == $project->user_id) {
            return response()->json(['data' => $project, 'status' => true, 'error' => false]);
        } else {
            return response()->json(['msg' => __('site.not_allow'), 'status' => true, 'error' => true]);
        }
    } // end of getProjectData

    protected function update(ProjectRequest $request, Project $project)
    {
        if (auth()->user()->id == $project->user_id) {
            $validate = $request->validated();
            if ($request->file) {
                $type = explode('/', $request->file->getMimeType())[0];
                if ($type == 'image') {
                    if ($project->hasImage()) {
                        $this->deleteImage($project->image, 'projects');
                    }
                    $validate['image'] = $this->uploadImage($request->file, 'projects');
                } else {
                    if ($project->hasDocument()) {
                        $this->deleteDocument($project->attachment, 'projects');
                    }
                    $validate['attachment'] = $this->uploadDocument($request->file, 'projects');
                }
            }
            $validate['user_id'] = auth()->id();
            try {
                $project->update($validate);
                session()->flash('success', __('site.added_successfully'));
                return redirect()->route('frontend.projects.index');
            } catch (\Exception $ex) {
                session()->flash('error', __('site.server_error'));
                return redirect()->route('frontend.projects.index');
            }
        } else {
            session()->flash('error', __('site.not_allow'));
            return redirect()->route('frontend.projects.index');
        }
    } // end of update

    public function destroy(Project $project)
    {
        if (auth()->user()->id == $project->user_id) {
            $project->delete();
            session()->flash('success', __('site.deleted_successfully'));
            return response(__('site.deleted_successfully'));
        } else {
            return __('site.not_allow');
        }
    } //end of destroy
}
