<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Profile\StoreProfileRequest;
use App\Http\Requests\Frontend\Profile\UpdateProfileRequest;
use App\Models\Domain;
use App\Models\Role;
use App\Models\User;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use UploadImage;

    public function index()
    {
        return view('frontend.user.index');
    }

    public function getCompleteProfile()
    {
        $roles = Role::whereNotIn('name', ['super_admin', 'admin'])->get();
        $domains = Domain::all();
        return view('frontend.user.complete-profile', compact('roles', 'domains'));
    }

    public function completeProfile(StoreProfileRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $user = auth()->user();
            $user->update($validated);
            $user->attachRoles($validated['roles']);
            DB::commit();
            session()->flash('success', __('site.welcome_to') . ' ' . config('app.name'));
            return redirect()->route('frontend.profile');
        } catch (Exception $ex) {
            DB::rollback();
            return $ex->getMessage();
            session()->flash('error', __('messages.server_error'));
            return redirect()->back()->withInput();
        }
    }

    protected function profile()
    {
        $roles = Role::whereNotIn('name', ['super_admin', 'admin'])->get();
        $domains = Domain::all();
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.user.profile', compact('roles', 'domains', 'user'));
    }

    protected function myProfile()
    {
        $roles = Role::whereNotIn('name', ['super_admin', 'admin'])->get();
        $domains = Domain::all();
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.user.myprofile', compact('roles', 'domains', 'user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $user = auth()->user();
            $user->update($validated);
            $user->detachRoles($user->roles);
            $user->attachRoles($validated['roles']);
            DB::commit();
            session()->flash('success', __('site.welcome_to') . ' ' . config('app.name'));
            return redirect()->route('frontend.profile');
        } catch (Exception $ex) {
            DB::rollback();
            session()->flash('error', __('messages.server_error'));
            return redirect()->back()->withInput();
        }
    }

    public function changeImage(Request $request)
    {
        $validated = [];
        if ($request->image) {
            if (auth()->user()->hasImage()) {
                $this->deleteImage(auth()->user()->image, 'users');
            }
            $validated['image'] = $this->uploadImage($request->image, 'users');
        }
        auth()->user()->update($validated);
        session()->flash('success', __('messages.profile_updated_successfully'));
        return redirect()->route('frontend.profile');
    }


    public function changePrivacy(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $user->update(['is_private' => $request->is_private]);
            DB::commit();
            session()->flash('success', __('messages.profile_updated_successfully'));
            return redirect()->route('frontend.profile');
        } catch (Exception $ex) {
            DB::rollback();
            session()->flash('error', __('messages.server_error'));
            return redirect()->back()->withInput();
        }
    }
}
