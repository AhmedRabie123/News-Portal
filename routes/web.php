<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminPostController;

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

/* Front Rnd  */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');




/* Admin */ 

Route::get('/admin/home',[AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login',[AdminLoginController::class, 'admin_login'])->name('admin_login');
Route::post('/admin/login-submit',[AdminLoginController::class, 'admin_login_submit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class, 'admin_logout'])->name('admin_logout');
Route::get('/admin/forget-password',[AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit',[AdminLoginController::class, 'admin_forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}',[AdminLoginController::class, 'admin_reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit',[AdminLoginController::class, 'admin_reset_password_submit'])->name('admin_reset_password_submit');

Route::get('/admin/edit-profile',[AdminProfileController::class, 'edit_profile'])->name('admin_edit_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit',[AdminProfileController::class, 'admin_profile_submit'])->name('admin_profile_submit');

// Advertisement

Route::get('/admin/home-advertisement',[AdminAdvertisementController::class, 'home_ad_show'])->name('admin_home_ad_show')->middleware('admin:admin');
Route::post('/admin/home-advertisement-update',[AdminAdvertisementController::class, 'home_ad_update'])->name('admin_home_ad_update');

Route::get('/admin/top-advertisement',[AdminAdvertisementController::class, 'top_ad_show'])->name('admin_top_ad_show')->middleware('admin:admin');
Route::post('/admin/top-advertisement-update',[AdminAdvertisementController::class, 'top_ad_update'])->name('admin_top_ad_update');

Route::get('/admin/sidebar-advertisement-view',[AdminAdvertisementController::class, 'sidebar_ad_show'])->name('admin_sidebar_ad_show')->middleware('admin:admin');
Route::get('/admin/sidebar-advertisement-create',[AdminAdvertisementController::class, 'sidebar_ad_create'])->name('admin_sidebar_ad_create')->middleware('admin:admin');
Route::post('/admin/sidebar-advertisement-store',[AdminAdvertisementController::class, 'sidebar_ad_store'])->name('admin_sidebar_ad_store');
Route::get('/admin/sidebar-advertisement-edit/{id}',[AdminAdvertisementController::class, 'sidebar_ad_edit'])->name('admin_sidebar_ad_edit')->middleware('admin:admin');
Route::post('/admin/sidebar-advertisement-update/{id}',[AdminAdvertisementController::class, 'sidebar_ad_update'])->name('admin_sidebar_ad_update');
Route::get('/admin/sidebar-advertisement-delete/{id}',[AdminAdvertisementController::class, 'sidebar_ad_delete'])->name('admin_sidebar_ad_delete')->middleware('admin:admin');

// Category

Route::get('/admin/category-show',[AdminCategoryController::class, 'category_show'])->name('admin_category_show')->middleware('admin:admin');
Route::get('/admin/category-create',[AdminCategoryController::class, 'category_create'])->name('admin_category_create')->middleware('admin:admin');
Route::post('/admin/category-store',[AdminCategoryController::class, 'category_store'])->name('admin_category_store')->middleware('admin:admin');
Route::get('/admin/category-edit/{id}',[AdminCategoryController::class, 'category_edit'])->name('admin_category_edit')->middleware('admin:admin');
Route::post('/admin/category-update/{id}',[AdminCategoryController::class, 'category_update'])->name('admin_category_update')->middleware('admin:admin');
Route::get('/admin/category-delete/{id}',[AdminCategoryController::class, 'category_delete'])->name('admin_category_delete')->middleware('admin:admin');

// SubCategory

Route::get('/admin/sub-category-show',[AdminSubCategoryController::class, 'sub_category_show'])->name('admin_sub_category_show')->middleware('admin:admin');
Route::get('/admin/sub-category-create',[AdminSubCategoryController::class, 'sub_category_create'])->name('admin_sub_category_create')->middleware('admin:admin');
Route::post('/admin/sub-category-store',[AdminSubCategoryController::class, 'sub_category_store'])->name('admin_sub_category_store')->middleware('admin:admin');
Route::get('/admin/sub-category-edit/{id}',[AdminSubCategoryController::class, 'sub_category_edit'])->name('admin_sub_category_edit')->middleware('admin:admin');
Route::post('/admin/sub-category-update/{id}',[AdminSubCategoryController::class, 'sub_category_update'])->name('admin_sub_category_update')->middleware('admin:admin');
Route::get('/admin/sub-category-delete/{id}',[AdminSubCategoryController::class, 'sub_category_delete'])->name('admin_sub_category_delete')->middleware('admin:admin');

// post 

Route::get('/admin/post-show',[AdminPostController::class, 'post_show'])->name('admin_post_show')->middleware('admin:admin');
Route::get('/admin/post-create',[AdminPostController::class, 'post_create'])->name('admin_post_create')->middleware('admin:admin');
Route::post('/admin/post-store',[AdminPostController::class, 'post_store'])->name('admin_post_store')->middleware('admin:admin');
Route::get('/admin/post-edit/{id}',[AdminPostController::class, 'post_edit'])->name('admin_post_edit')->middleware('admin:admin');
Route::post('/admin/post-update/{id}',[AdminPostController::class, 'post_update'])->name('admin_post_update')->middleware('admin:admin');
Route::get('/admin/post-delete/{id}',[AdminPostController::class, 'post_delete'])->name('admin_post_delete')->middleware('admin:admin');
Route::get('/admin/post-tag-delete/{id}/{id1}',[AdminPostController::class, 'tag_delete'])->name('admin_tag_delete')->middleware('admin:admin');




