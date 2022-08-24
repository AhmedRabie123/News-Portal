<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;

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


/* Admin */ 

Route::get('/admin/home',[AdminHomeController::class, 'index'])->name('admin_home');
Route::get('/admin/login',[AdminLoginController::class, 'index'])->name('admin_login');
Route::get('/admin/forget-password',[AdminLoginController::class, 'forget_password'])->name('admin_forget_password');

