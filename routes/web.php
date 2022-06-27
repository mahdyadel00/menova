<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Frontend\GetPreimiumController;
use App\Http\Controllers\Frontend\ChatController;
Route::prefix(LaravelLocalization::setLocale())
    ->middleware([
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath',
    ])
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/raise', function(){
                return view('frontend.coming_soon');
            })->name('rasie');
        });

        Auth::routes(['verify' => true]);

        // UnAuthentication routes.
        Route::name('frontend.')->group(function () {
            Route::get('blogs', 'HomeController@blogs')->name('blogs');
            Route::get('blogs/{slug}', 'HomeController@showBlog')->name('blogs.show');
        });

        // Auth with provider routes.
        Route::get('auth/{provider}/redirect', 'AuthSocialiteController@redirectToProvider')->name('login_with');
        Route::get('auth/{provider}/callback', 'AuthSocialiteController@handleProviderCallback');

        Route::name('frontend.')->group(function () {
            Route::post('/contact-us', 'HomeController@contact')->name('contact');
            Route::namespace('Frontend')->group(function () {
                // Authentication routes
                Route::middleware(['auth', 'verified'])->group(function () {
                    Route::get('/user', 'UserController@index')->name('user_home');
                    Route::get('/user/home', 'UserController@index')->name('user_home');
                    Route::get('/complete-profile', 'UserController@getCompleteProfile')
                        ->middleware('profileCompleted')
                        ->name('get_complete_profile');
                    Route::post('/complete-profile', 'UserController@completeProfile')->name('complete_profile');
                    Route::get('/myprofile', 'UserController@myProfile')->name('my_profile');
                    Route::get('/profile', 'UserController@profile')->name('profile');
                    Route::post('/profile', 'UserController@updateProfile')->name('update_profile');
                    Route::post('/profile-change-image', 'UserController@changeImage')->name('user_change_image');
                    Route::post('/profile-change-privacy', 'UserController@changePrivacy')->name('user_change_privacy');
                    // User-projects
                    Route::get('my-projects', 'ProjectController@index')->name('projects.index');
                    Route::post('my-projects', 'ProjectController@store')->name('projects.store');
                    Route::get('my-projects/{project}', 'ProjectController@show')->name('projects.show');
                    Route::get('project/details/{project}', 'ProjectController@details')->name('projects.details');
                    Route::get('project-data', 'ProjectController@getProjectData')->name('projects.get_data');
                    Route::post('my-projects/{project}/update', 'ProjectController@update')->name('projects.update');
                    Route::delete('my-projects/{project}/delete', 'ProjectController@destroy')->name('projects.destroy');
                    // Discusses
                    Route::get('discuss/trending', 'DiscussController@index')->name('discusses.index');
                    Route::get('discuss', 'DiscussController@create')->name('discusses.create');
                    Route::post('discuss', 'DiscussController@store')->name('discusses.store');
                    Route::get('discuss/{uuid}', 'DiscussController@show')->name('discusses.show');
                    // Comments.
                    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
                    Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
                    Route::post('/like', 'LikeController@like')->name('likes.add');

                    //get preimium
                    Route::get('get_preimmium' , [GetPreimiumController::class , 'index'])->name('get_premium.index');

                    //Chat
                    Route::get('chat' , [ChatController::class , 'index'])->name('chat.index');

                    ///raise
                    Route::get('/raise', function(){
                        return view('frontend.coming_soon');
                    })->name('rasie');
                });
            });
        });
    });