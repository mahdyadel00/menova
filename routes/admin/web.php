<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\OurClientController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ConnectController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\AdvisorController;
use App\Http\Controllers\Admin\EmailSubscribeController;
use App\Http\Controllers\Admin\RaisController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath',
        'auth',
        'role:admin|super_admin',
    ]
], function () {

    Route::name('admin.')->prefix('admin')->group(function () {

        //home
        Route::get('/', function () {
            return redirect()->route('admin.home');
        });

        //home
        Route::get('/home', 'HomeController@index')->name('home');

        //role routes
        Route::get('/roles/data', 'RoleController@data')->name('roles.data');
        Route::delete('/roles/bulk_delete', 'RoleController@bulkDelete')->name('roles.bulk_delete');
        Route::resource('roles', 'RoleController');

        //admin routes
        Route::get('/admins/data', 'AdminController@data')->name('admins.data');
        Route::delete('/admins/bulk_delete', 'AdminController@bulkDelete')->name('admins.bulk_delete');
        Route::resource('admins', 'AdminController');

        //user routes
        Route::get('/users/data', 'UserController@data')->name('users.data');
        Route::get('/users/list', 'UserController@list')->name('users.list');
        Route::delete('/users/bulk_delete', 'UserController@bulkDelete')->name('users.bulk_delete');
        Route::resource('users', 'UserController');

        //project typ routes
        Route::get('/project-types/data', 'ProjectTypeController@data')->name('project-types.data');
        Route::delete('/project-types/bulk_delete', 'ProjectTypeController@bulkDelete')->name('project-types.bulk_delete');
        Route::resource('project-types', 'ProjectTypeController');

        //domains routes
        Route::get('/domains/data', 'DomainController@data')->name('domains.data');
        Route::delete('/domains/bulk_delete', 'DomainController@bulkDelete')->name('domains.bulk_delete');
        Route::resource('domains', 'DomainController');

        //projects routes
        Route::get('/projects/data', 'ProjectController@data')->name('projects.data');
        Route::delete('/projects/bulk_delete', 'ProjectController@bulkDelete')->name('projects.bulk_delete');
        Route::resource('projects', 'ProjectController');

        // Contacts
        Route::get('/contacts/data', 'ContactController@data')->name('contacts.data');
        Route::delete('/contacts/bulk_delete', 'ContactController@bulkDelete')->name('contacts.bulk_delete');
        Route::post('/contacts/replay/{id}', 'ContactController@replay')->name('contacts.replay');
        Route::resource('contacts', 'ContactController');

        // Blogs
        Route::get('/blogs/data', 'BlogController@data')->name('blogs.data');
        Route::delete('/blogs/bulk_delete', 'BlogController@bulkDelete')->name('blogs.bulk_delete');
        Route::resource('blogs', 'BlogController');
        Route::post('blogs/store' , [BlogController::class , 'store'])->name('blogs.store');

        // Topics
        Route::get('/discuss/topics/data', 'TopicController@data')->name('topics.data');
        Route::delete('/discuss/topics/bulk_delete', 'TopicController@bulkDelete')->name('topics.bulk_delete');
        Route::resource('topics', 'TopicController');

        // Discusses
        Route::get('/discusses/data', 'DiscussController@data')->name('discusses.data');
        Route::post('/discusses/{discuss}/change-status', 'DiscussController@changeStatus')->name('discusses.change');
        Route::delete('/discusses/bulk_delete', 'DiscussController@bulkDelete')->name('discusses.bulk_delete');
        Route::resource('discusses', 'DiscussController');

        //setting routes
        Route::get('/settings/general', 'SettingController@general')->name('settings.general');
        Route::get('/settings/contact', 'SettingController@contact')->name('settings.contact');
        Route::resource('settings', 'SettingController')->only(['store']);

        //profile routes
        Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::put('/profile/update', 'ProfileController@update')->name('profile.update');

        Route::name('profile.')->namespace('Profile')->group(function () {
            //password routes
            Route::get('/password/edit', 'PasswordController@edit')->name('password.edit');
            Route::put('/password/update', 'PasswordController@update')->name('password.update');
        });

        //---------------------------------------------**  Slider Route  **--------------------------------------------------------------------------------
        Route::get('sliders' , [SliderController::class , 'index'])->name('sliders.index');
        Route::get('sliders/data' , [SliderController::class , 'data'])->name('sliders.data');
        Route::delete('sliders/bulk_delete' , [SliderController::class , 'bulkDelete'])->name('sliders.bulk_delete');
        Route::resource('sliders', 'SliderController'); 
        Route::post('sliders/store' , [SliderController::class , 'store'])->name('sliders.store');

        //---------------------------------------------**  Services Route  **--------------------------------------------------------------------------------

        Route::get('services' , [ServicesController::class , 'index'])->name('services.index');
        Route::get('services/data' , [ServicesController::class , 'data'])->name('services.data');
        Route::delete('services/bulk_delete' , [ServicesController::class , 'bulkDelete'])->name('services.bulk_delete');
        Route::resource('services', 'ServicesController'); 
        Route::post('services/store' , [ServicesController::class , 'store'])->name('services.store');

        //---------------------------------------------**  Our Client Route  **--------------------------------------------------------------------------------

        Route::get('our_clients' , [OurClientController::class , 'index'])->name('our_clients.index');
        Route::get('our_clients/data' , [OurClientController::class , 'data'])->name('our_clients.data');
        Route::delete('our_clients/bulk_delete' , [OurClientController::class , 'bulkDelete'])->name('our_clients.bulk_delete');
        Route::resource('our_clients', 'OurClientController'); 
        Route::post('our_clients/store' , [OurClientController::class , 'store'])->name('our_clients.store');

        //---------------------------------------------**  About Us Route  **--------------------------------------------------------------------------------

        Route::get('about_us' , [AboutUsController::class , 'index'])->name('about_us.index');
        Route::get('about_us/data' , [AboutUsController::class , 'data'])->name('about_us.data');
        Route::delete('about_us/bulk_delete' , [AboutUsController::class , 'bulkDelete'])->name('about_us.bulk_delete');
        Route::resource('about_us', 'AboutUsController'); 
        Route::post('about_us/store' , [AboutUsController::class , 'store'])->name('about_us.store');

        //---------------------------------------------**  Connects Route  **--------------------------------------------------------------------------------

        Route::get('connects' , [ConnectController::class , 'index'])->name('connects.index');
        Route::get('connects/data' , [ConnectController::class , 'data'])->name('connects.data');
        Route::delete('connects/bulk_delete' , [ConnectController::class , 'bulkDelete'])->name('connects.bulk_delete');
        Route::resource('connects', 'ConnectController'); 
        Route::post('connects/store' , [ConnectController::class , 'store'])->name('connects.store');

        //---------------------------------------------**  Counter Route  **--------------------------------------------------------------------------------

        Route::get('counters' , [CounterController::class , 'index'])->name('counters.index');
        Route::get('counters/data' , [CounterController::class , 'data'])->name('counters.data');
        Route::delete('counters/bulk_delete' , [CounterController::class , 'bulkDelete'])->name('counters.bulk_delete');
        Route::resource('counters', 'CounterController'); 
        Route::post('counters/store' , [CounterController::class , 'store'])->name('counters.store');

        //---------------------------------------------**  Advisors Route  **--------------------------------------------------------------------------------

        Route::get('advisors' , [AdvisorController::class , 'index'])->name('advisors.index');
        Route::get('advisors/data' , [AdvisorController::class , 'data'])->name('advisors.data');
        Route::delete('advisors/bulk_delete' , [AdvisorController::class , 'bulkDelete'])->name('advisors.bulk_delete');
        Route::resource('advisors', 'AdvisorController'); 
        Route::post('advisors/store' , [AdvisorController::class , 'store'])->name('advisors.store');

        //---------------------------------------------**  EmailSubscribe Route  **--------------------------------------------------------------------------------

        Route::get('email/subscribe' , [EmailSubscribeController::class , 'index'])->name('email_subscribe.index');
        Route::get('email/subscribe/data' , [EmailSubscribeController::class , 'data'])->name('email_subscribe.data');

        //---------------------------------------------**  Rais Route  **--------------------------------------------------------------------------------

        Route::get('rais' , [RaisController::class , 'index'])->name('rais.index');
        Route::get('rais/data' , [RaisController::class , 'data'])->name('rais.data');


    });
});