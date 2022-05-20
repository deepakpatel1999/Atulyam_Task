<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');
 
 Route::get('User_Create', [App\Http\Controllers\HomeController::class, 'User_Create'])->name('User_Create')->middleware('admin');
 
 Route::post('User_insert', [App\Http\Controllers\HomeController::class, 'User_insert'])->name('User_insert')->middleware('admin');
 
 Route::post('User_update', [App\Http\Controllers\HomeController::class, 'User_update'])->name('User_update')->middleware('admin');
 
 Route::get('user_edit/{id}', [App\Http\Controllers\HomeController::class, 'user_edit'])->name('user_edit')->middleware('admin');
 
 Route::get('user_delete/{id}', [App\Http\Controllers\HomeController::class, 'user_delete'])->name('user_delete')->middleware('admin');




