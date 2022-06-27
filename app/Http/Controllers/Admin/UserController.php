<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\UploadImage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    use UploadImage;

    private $model;
    public function __construct(User $model)
    {
        $this->middleware('permission:read_users')->only(['index']);
        $this->middleware('permission:create_users')->only(['create', 'store']);
        $this->middleware('permission:update_users')->only(['edit', 'update']);
        $this->middleware('permission:delete_users')->only(['delete', 'bulk_delete']);
        $this->model = $model;
    } // end of __construct

    public function index()
    {
        return view('admin.users.index');
    } // end of index

    public function data()
    {
        $users = $this->model->with(['roles' => function ($q) {
            return $q->where('name', '!=', 'super_admin');
        }])->select();

        return DataTables::of($users)
            ->addColumn('record_select', 'admin.users.data_table.record_select')
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('Y-m-d');
            })
            ->editColumn('full_name', function (User $user) {
                return $user->full_name;
            })
            ->addColumn('avatar', function (User $user) {
                return view('admin.users.data_table.avatar', compact('user'))->render();
            })
            ->addColumn('actions', 'admin.users.data_table.actions')
            ->rawColumns(['record_select', 'actions', 'avatar'])
            ->toJson();
    } // end of data

    public function create()
    {
        $roles = Role::whereNotIn('name', ['super_admin'])->get();
        return view('admin.users.create', compact('roles'));
    } // end of create

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        if ($request->image) {
            $data['image'] = $this->uploadImage($request->image, 'users');
        }
        $user = $this->model->create($data);
        $user->attachRoles($data['roles']);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.users.index');
    } // end of store

    public function edit(User $user)
    {
        $roles = Role::whereNotIn('name', ['super_admin'])->get();
        $user = $this->model->with('roles')->findOrFail($user->id);
        return view('admin.users.edit', compact('user', 'roles'));
    } // end of edit

    protected function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        if ($request->image) {
            if ($user->hasImage()) {
                $this->deleteImage($user->image, 'users');
            }
            $data['image'] = $this->uploadImage($request->image, 'users');
        }
        $user->update($data);
        $user->detachRoles($request->roles);
        $user->attachRole($data['roles']);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.users.index');
    } // end of update

    public function destroy(User $user)
    {
        $this->delete($user);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $user = $this->model->FindOrFail($recordId);
            $this->delete($user);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(User $user)
    {
        $user->delete();
    } // end of delete

    public function list()
    {
        $query = $this->model->query();
        $query = $query->when(\request()->input('query') != '', function ($q) {
            $q->where('role', '!=', 'super_admin')
                ->where('first_name', 'like', '%' . \request()->input('query') . '%')
                ->orWhere('last_name', 'like', '%' . \request()->input('query') . '%');
        });
        $users = $query->select(['id', 'first_name', 'last_name'])->paginate(10);

        return response()->json($users);
    } // end of list
}