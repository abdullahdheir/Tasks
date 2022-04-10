<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [TaskController::class, 'index'])->name('tasks_index');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks_edit');
Route::post('/store', [TaskController::class, 'store'])->name('tasks_store');
Route::get('/destroy/{id}', [TaskController::class, 'destroy'])->name('tasks_destroy');
Route::post('/update/{id}', [TaskController::class, 'update'])->name('tasks_update');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
