<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('tasks', function () {
    $tasks = \App\Task::with('users')
        ->where('completed', '=', null)->get();
    return $tasks;
});

Route::put('task/{id}', function($id) {
    $task = \App\Task::find($id);
    $task->completed = now();
    if($task->save()){
        return response(['status' => 200, 'content' => 'task was completed'], 200);
    }
});

Route::delete('task/{id}', function ($id) {
    $task = \App\Task::find($id);
    $task->users()->detach($task->users);
    if( $task->destroy($id)){
        return response(['status' => 200, 'content' => 'task was deleted'], 200);
    }
});