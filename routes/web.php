<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');



/**
 * Show Task Dashboard
 */
Route::get('/tasks', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('todolist.tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
          return redirect('/tasks')
          ->withInput()
          ->withErrors($validator);
    }

    // Create The Task...
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/tasks');
});
/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    //
});
