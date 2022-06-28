<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Frontend\GetPreimiumController;
use App\Http\Controllers\Frontend\ChatController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\ConnectController;
use App\Http\Controllers\Frontend\RaisController;
use App\Http\Controllers\Frontend\BlogController;
Route::prefix(LaravelLocalization::setLocale())
    ->middleware([
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath',
    ])
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/contacts', [ContactController::class , 'index'])->name('contacts.index');
            Route::get('/about_us', [AboutUsController::class , 'index'])->name('about_us.index');
            Route::get('/services', [ServicesController::class , 'index'])->name('services.index');
            Route::get('/connects', [ConnectController::class , 'index'])->name('connect.index');
            Route::get('/rais', [RaisController::class , 'index'])->name('rais.index');
            Route::get('/blogs', [BlogController::class , 'index'])->name('blogs.index');
           
          
            Route::get('/discuss', function () {
                return view('frontend.discuss');
            });
            Route::get('/discuss-single', function () {
                return view('frontend.discuss-single');
            });
            Route::get('/find-cofounder', function () {
                return view('frontend.find-cofounder');
            });
            Route::get('/user-profile', function () {
                return view('frontend.user-profile');
            });
            Route::get('/login', function () {
                return view('frontend.login');
            });




           
        });

        Auth::routes(['verify' => true]);

        // UnAuthentication routes.
        Route::name('frontend.')->group(function () {
            // Route::get('blogs', 'HomeController@blogs')->name('blogs');
            // Route::get('blogs/{slug}', 'HomeController@showBlog')->name('blogs.show');
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

                   
                });
            });
        });
    });