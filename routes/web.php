<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskControlletr;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    $tasks = \App\Models\Task::all();
    return view('home', compact('tasks'));
})->name('home');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authentication'])->name('authentication');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerCreate'])->name('registerCreate');

Route::get('/profile/{user}', [UserController::class, 'show'])->middleware('auth')->name('profile');

Route::get('/logout', [LoginController::class, 'logOut'])->name('logout');

Route::get('task', [TaskControlletr::class, 'index'])->name('create_tasks');
Route::get('show_task{task}', [TaskControlletr::class, 'show'])->name('show_task');
Route::get('edit_task/{task}', [TaskControlletr::class, 'edit'])->name('edit_task');
Route::patch('store_task/{task}', [TaskControlletr::class, 'update'])->name('update_task');
Route::delete('destroy_task/{task}', [TaskControlletr::class, 'destroy'])->name('destroy_task');
Route::post('task', [TaskControlletr::class, 'store'])->name('task.store');

Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('category_create', [AdminController::class, 'create'])->name('create_category');
Route::get('admin/{task}', [AdminController::class, 'show'])->name('admin_show');
Route::post('category_create', [AdminController::class, 'store'])->name('store_category');
Route::get('delete/{category}', [AdminController::class, 'destroy'])->name('delete');

Route::get('status_ok/{task}', [StatusController::class, 'status_ok'])->name('status_ok');
Route::get('status_otkaz/{task}', [StatusController::class, 'status_otk'])->name('status_otk');
Route::patch('status_update/{task}', [StatusController::class, 'status_upd_ok'])->name('status_upd_ok');
Route::patch('status_update_otk/{task}', [StatusController::class, 'status_upd_otk'])->name('status_upd_otk');

Route::get('filter', [FilterController::class, 'filter'])->name('filter');
