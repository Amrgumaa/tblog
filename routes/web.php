<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/t', function () {
    return view('test.index');
});

//Frontend Routes
Route::get('/', 'FrontEndcontroller@home')->name('website');
Route::get('/category/{slug}', 'FrontEndcontroller@category')->name('website.category');
Route::get('/tag/{slug}', 'FrontEndcontroller@tag')->name('website.tag');
Route::get('/aboutus', 'FrontEndcontroller@aboutus')->name('website.aboutus');
Route::post('/contactus', 'FrontEndController@contact_message')->name('website.contactus');
Route::get('/contactus', 'FrontEndcontroller@contactus')->name('website.contact');
Route::get('/post/{slug}', 'FrontEndcontroller@post')->name('website.post');
Route::get('/bio/{id}', 'FrontEndcontroller@bio')->name('website.bio');
//End Of Frontend Routes
//Start of admin Routes
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });
    Route::resource('/category', 'CategoryController');
    Route::resource('/post', 'PostController');
    Route::resource('/tag', 'TagController');
    Route::resource('/user', 'UserController');
    Route::resource('/color', 'ColorController');
    Route::resource('/contact', 'ContactController');
});
