<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/users/changeStatus','UserController@changeStatus');
	
    Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
    Route::get('/property_types/grid', 'Property_typesController@grid');
    Route::resource('/property_types', 'Property_typesController');
    Route::get('/category_types/grid', 'Category_typesController@grid');
    Route::resource('/category_types', 'Category_typesController');
    Route::get('/bed_types/grid', 'Bed_typesController@grid');
    Route::resource('/bed_types', 'Bed_typesController');
    Route::get('/furniture_types/grid', 'Furniture_typesController@grid');
    Route::resource('/furniture_types', 'Furniture_typesController');
    Route::get('/room_types/grid', 'Room_typesController@grid');
    Route::resource('/room_types', 'Room_typesController');
    Route::get('/room_amenities/grid', 'Room_amenitiesController@grid');
    Route::resource('/room_amenities', 'Room_amenitiesController');
    Route::get('/bathroom_types/grid', 'Bathroom_typesController@grid');
    Route::resource('/bathroom_types', 'Bathroom_typesController');
});




