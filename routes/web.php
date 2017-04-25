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

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    //tasks
    Route::get('tasks', ['as' => 'tasks', 'uses' => 'TaskController@show']);
    Route::get('tasks/create', ['as' => 'task.create', 'uses' => 'TaskController@create']);
    Route::post('tasks/store', ['as' => 'task.store', 'uses' => 'TaskController@store']);
    Route::post('tasks/update', ['as' => 'task.update', 'uses' => 'TaskController@update']);
    Route::get('tasks/delete/{id}', ['as' => 'task.delete', 'uses' => 'TaskController@delete']);
    Route::get('tasks/{id}', ['as' => 'task.details', 'uses' => 'TaskController@show']);

    //subtasks
    Route::get('subtasks/create', ['as' => 'subtask.create', 'uses' => 'SubtaskController@create']);
    Route::post('subtasks/store', ['as' => 'subtask.store', 'uses' => 'SubtaskController@store']);
    Route::post('subtasks/update', ['as' => 'subtask.update', 'uses' => 'SubtaskController@update']);
    Route::get('subtasks/delete/{id}', ['as' => 'subtask.delete', 'uses' => 'SubtaskController@delete']);
    Route::get('subtasks/{id}', ['as' => 'subtask.details', 'uses' => 'SubtaskController@show']);
    
});
Route::get('/home', 'HomeController@index');
