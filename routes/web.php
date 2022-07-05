<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
// Route example


Auth::routes();
// Homepage
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route of change password
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');

// Route of register by invite email
Route::get('register/request', 'Auth\RegisterController@requestInvitation')->name('requestInvitation');
Route::post('invitations', 'InvitationsController@store')->middleware('guest')->name('storeInvitation');

// AdminLTE page
    Route::get('/admin', function () {

        $users = User::orderBy('created_at', 'asc')->get();
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('admin.welcome', [
            'users' => $users,
            'tasks' => $tasks
        ]);
    });

    Route::get('/admin/users', function () {

        $users = User::orderBy('created_at', 'asc')->get();
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('admin.users.list', [
            'users' => $users,
            'tasks' => $tasks
        ]);
    });

    Route::get('/admin/users/{user}', function (User $user) {

        $users = User::orderBy('created_at', 'asc')->get();
        $tasks = Task::orderBy('created_at', 'asc')->get();
        $user = Task::find($user);

        return view('admin.users.view', [
            'users' => $users,
            'tasks' => $tasks,
            'user' => $user
        ]);
    });

    Route::get('/admin/tasks', function () {

        $users = User::orderBy('created_at', 'asc')->get();
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('admin.tasks.list', [
            'users' => $users,
            'tasks' => $tasks
        ]);
    });

    Route::get('/admin/tasks/{task}', function (Task $task) {

        $users = User::orderBy('created_at', 'asc')->get();
        $tasks = Task::orderBy('created_at', 'asc')->get();
        $task = Task::find($task);

        return view('admin.tasks.view', [
            'users' => $users,
            'tasks' => $tasks,
            'task' => $task
        ]);
    });


/**
 * Invitations group with auth middleware.
 * Even though we only have one route currently, the route group is for future updates.
 */
Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'invitations'
], function() {
    Route::get('/', 'InvitationsController@index')->name('showInvitations');
});

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
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect('/tasks');
    });

/**
 * Delete Task
 */
    Route::delete('/task/{task}', function (Task $task) {
        $task->delete();
        return redirect('/tasks');
    });

/**
 * Update Task
 */
Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'task.update'
], function() {
    Route::put('/task/{task}', function (Task $task) {
        $task->update([
            'completed' => '1'
        ]);
        return redirect('/tasks');
    });
});

// Route for gestion tasks with livewire components of
Route::view('tasks/list', 'livewire.home');
