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

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/jansen', function () {
    return view('jansen');
});



Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'HomeController@dashboard');
    Route::resource('users', 'UserController');
    Route::resource('projects', 'ProjectController');
    Route::resource('tasks', 'TaskController');
    Route::patch('/task/{task}/complete' , 'TaskController@toggleComplete');

});




Route::get('/test', function () {
    return view('test');
});
