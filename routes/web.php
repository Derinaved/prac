<?php

use App\Http\Controllers\LoginController;
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

Route::get('task', [TaskControlletr::class, 'index'])->name('tasks');
Route::post('task', [TaskControlletr::class, 'store'])->name('task.store');

