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
    return view('welcome');
});

Route::get('/testlogin', function () {
    return view('testlogin');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logs', 'LogController@create');

Route::resource('log', 'LogController');

Route::resource('equipment', 'EquipmentController');
Route::resource('equipmentlog', 'EquipmentLogController');

Route::get('/admin', function() {
    return 'you are admin';
})->middleware(['auth', 'auth.admin']);


// group everything together and apply the middleware
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function () {
    // except argument because we removed those functions from the made resource controller
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
});
