<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Traits\UploadImage;

class ProfileController extends Controller
{
    use UploadImage;

    public function edit()
    {
        return view('admin.profile.edit');
    } // end of getChangeData

    public function update(ProfileRequest $request)
    {
        
        $validated = $request->validated();
        if ($request->image) {
            if (auth()->user()->hasImage()) {
                $this->deleteImage(auth()->user()->image, 'users');
            }
            $validated['image'] = $this->uploadImage($request->image, 'users');
        }
        auth()->user()->update($validated);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.home');
    } // end of postChangeData

}//end of controller