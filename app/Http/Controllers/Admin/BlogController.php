<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\Domain;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use UploadImage;

    public function __construct()
    {
        $this->middleware('permission:read_blogs')->only(['index']);
        $this->middleware('permission:create_blogs')->only(['create', 'store']);
        $this->middleware('permission:read_blogs')->only(['show']);
        $this->middleware('permission:update_blogs')->only(['edit', 'update']);
        $this->middleware('permission:delete_blogs')->only(['delete', 'bulk_delete']);
    } // end of __construct

    public function index()
    {
        return view('admin.blogs.index');
    } // end of index

    protected function data()
    {
        $blogs = Blog::with([
            'domain',
            'data' => function($query){

                $query->where('locale' , app()->getLocale());
            },
        ])->select();

        return DataTables::of($blogs)
            ->addColumn('record_select', 'admin.blogs.data_table.record_select')
            ->addColumn('title', function ($blogs) {

                return $blogs->data->isNotEmpty() ? $blogs->data->first()->title : '';
            })
            // ->editColumn('title', function (Blog $blog) {
            //     return '<a href="' . route('admin.blogs.show', $blog->id) . '" target="_blank">' . $blog->title . '</a>';
            // })
            ->editColumn('domain', function (Blog $blog) {
                return $blog->domain->name;
            })
            ->editColumn('user', function (Blog $blog) {
                return $blog->user->full_name;
            })
            ->editColumn('created_at', function (Blog $blog) {
                return $blog->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.blogs.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'title'])
            ->toJson();
    } // end of data

    protected function create()
    {
        $domains = Domain::all();
        return view('admin.blogs.create', compact('domains'));
    } // end of create

    protected function store(Request $request)
    {
        //    dd($request->all());
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'body' => $request->input($locale . '_body'),
            ];
        }
        $data['user_id'] = auth()->id();
        $data['domain_id'] = $request->domain_id;

        if ($request->image) {
            $data['image'] = $this->uploadImage($request->image, 'blogs');
        }

        Blog::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.blogs.index');
    } // end of store

    protected function show(Blog $blog)
    {
        return redirect()->route('frontend.blogs.show', $blog->slug);
    } // end of show

    protected function edit(Blog $blog)
    {
        $domains = Domain::all();
        return view('admin.blogs.edit', compact('blog', 'domains'));
    } // end of edit

    protected function update(BlogRequest $request, Blog $blog)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input($locale . '_title'),
                'body' => $request->input($locale . '_body'),
            ];
        }
        $data['domain_id'] = $request->domain_id;
        if ($request->image) {
            if ($blog->hasImage()) {
                $this->deleteImage($blog->image, 'blogs');
            }
            $data['image'] = $this->uploadImage($request->image, 'blogs');
        }

        $blog->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.blogs.index');
    } // end of update

    protected function destroy(Blog $blog)
    {
        $this->delete($blog);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    protected function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {
            $blog = Blog::FindOrFail($recordId);
            $this->delete($blog);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Blog $blog)
    {

        if ($blog->image) {
            $this->deleteImage($blog->image, 'blogs');
        }
        $blog->delete();
    } // end of delete

}//end of controller
