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

Route::get('users', function () {
    return \App\User::all();
});

Route::post('task', function (Request $request) {

    $request->validate([
       'title' => 'required|min:2',
    ]);

    $task = new \App\Task();
    $task->title = $request->title;
    $task->description = $request->description ?? null;
    $task->due = $request->due ?? null;

    $task->save();

    $task->users()->attach($request->users);

    return response(['status' => 200,
        "content" => "Task was created succesfully"],
        200);

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