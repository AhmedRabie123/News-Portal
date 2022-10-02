<?php

// front Controller Route


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\DisclaimerController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\OnlinePollController;
use App\Http\Controllers\Front\ArchiveController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Front\LanguageController;


// Author Controller Route

use App\Http\Controllers\Author\AuthorHomeController;
use App\Http\Controllers\Author\AuthorProfileController;
use App\Http\Controllers\Author\AuthorPostController;

// Admin Controller Route

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminLiveChannelController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
use App\Http\Controllers\Admin\AdminSocialItemController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminLanguageController;





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

/* Front Rnd Route */


// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// language result
Route::post('/language/switch', [LanguageController::class, 'switch_language'])->name('front_language');

// search section Get Subcategory By Category
Route::get('/subcategory-by-category/{id}', [HomeController::class, 'get_subcategory_by_category'])->name('subcategory_by_category');

// search Page result
Route::post('/search/result', [HomeController::class, 'search'])->name('search_result');

// About Page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_form_submit');

// FAQ Page
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Terms & Condition Page
Route::get('/terms & conditions', [TermsController::class, 'index'])->name('terms');

// Privacy Page
Route::get('/privacy & policy', [PrivacyController::class, 'index'])->name('privacy');

// Disclaimer Page
Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');

// News Detail Page
Route::get('/news-detail/{id}', [PostController::class, 'detail'])->name('news_detail');

// Category Section
Route::get('/category/{id}', [SubCategoryController::class, 'index'])->name('all_category');

// Photo Gallery Page
Route::get('/photo-gallery', [PhotoController::class, 'index'])->name('photo_gallery');

// Video Gallery Page
Route::get('/video-gallery', [VideoController::class, 'index'])->name('video_gallery');

// Subscribe Section
Route::post('/subscriber', [SubscriberController::class, 'index'])->name('subscribe');
Route::get('/subscriber/verified/{token}/{email}', [SubscriberController::class, 'subscriber_verified'])->name('subscriber_verified');

// Online Poll Section
Route::post('/online-poll', [OnlinePollController::class, 'submit'])->name('online_poll_submit');
Route::get('/online-poll', [OnlinePollController::class, 'previous_poll'])->name('poll_previous');

// Archive Section
Route::post('/archive/show', [ArchiveController::class, 'show'])->name('archive_show');
Route::get('/archive/{year}/{month}', [ArchiveController::class, 'archive_detail'])->name('archive_detail');

// Tag Section
Route::get('/tag/{tag_name}', [TagController::class, 'show'])->name('tag_post_show');

// Login Page
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/author/login-submit',[LoginController::class, 'author_login_submit'])->name('author_login_submit');
Route::get('/author/logout',[LoginController::class, 'author_logout'])->name('author_logout');

/* Author Route */
// Author Forget Password section

Route::get('/author/forget-password',[LoginController::class, 'author_forget_password'])->name('author_forget_password');
Route::post('/author/forget-password-submit',[LoginController::class, 'author_forget_password_submit'])->name('author_forget_password_submit');
Route::get('/author/reset-password/{token}/{email}',[LoginController::class, 'author_reset_password'])->name('author_reset_password');
Route::post('/author/reset-password-submit',[LoginController::class, 'author_reset_password_submit'])->name('author_reset_password_submit');

/* Author Route */

// Author home section

Route::get('/author/home',[AuthorHomeController::class, 'index'])->name('author_home')->middleware('author:author');

// Author profile section

Route::get('/author/edit-profile',[AuthorProfileController::class, 'author_edit_profile'])->name('author_edit_profile')->middleware('author:author');
Route::post('/author/edit-profile-submit',[AuthorProfileController::class, 'author_profile_submit'])->name('author_profile_submit');

// Author Post section

Route::get('/author/post-show',[AuthorPostController::class, 'author_post_show'])->name('author_post_show')->middleware('author:author');
Route::get('/author/post-create',[AuthorPostController::class, 'author_post_create'])->name('author_post_create')->middleware('author:author');
Route::post('/author/post-store',[AuthorPostController::class, 'author_post_store'])->name('author_post_store')->middleware('author:author');
Route::get('/author/post-edit/{id}',[AuthorPostController::class, 'author_post_edit'])->name('author_post_edit')->middleware('author:author');
Route::post('/author/post-update/{id}',[AuthorPostController::class, 'author_post_update'])->name('author_post_update')->middleware('author:author');
Route::get('/author/post-delete/{id}',[AuthorPostController::class, 'author_post_delete'])->name('author_post_delete')->middleware('author:author');
Route::get('/author/post-tag-delete/{id}/{id1}',[AuthorPostController::class, 'author_tag_delete'])->name('author_tag_delete')->middleware('author:author');



/* Admin Route */ 

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

// Setting

Route::get('/admin/setting',[AdminSettingController::class, 'index'])->name('admin_setting')->middleware('admin:admin');
Route::post('/admin/setting-update',[AdminSettingController::class, 'setting_update'])->name('admin_setting_update')->middleware('admin:admin');

// Photo Gallery

Route::get('/admin/photo-show',[AdminPhotoController::class, 'photo_show'])->name('admin_photo_show')->middleware('admin:admin');
Route::get('/admin/photo-create',[AdminPhotoController::class, 'photo_create'])->name('admin_photo_create')->middleware('admin:admin');
Route::post('/admin/photo-store',[AdminPhotoController::class, 'photo_store'])->name('admin_photo_store')->middleware('admin:admin');
Route::get('/admin/photo-edit/{id}',[AdminPhotoController::class, 'photo_edit'])->name('admin_photo_edit')->middleware('admin:admin');
Route::post('/admin/photo-update/{id}',[AdminPhotoController::class, 'photo_update'])->name('admin_photo_update')->middleware('admin:admin');
Route::get('/admin/photo-delete/{id}',[AdminPhotoController::class, 'photo_delete'])->name('admin_photo_delete')->middleware('admin:admin');

// video Gallery

Route::get('/admin/video-show',[AdminVideoController::class, 'video_show'])->name('admin_video_show')->middleware('admin:admin');
Route::get('/admin/video-create',[AdminVideoController::class, 'video_create'])->name('admin_video_create')->middleware('admin:admin');
Route::post('/admin/video-store',[AdminVideoController::class, 'video_store'])->name('admin_video_store')->middleware('admin:admin');
Route::get('/admin/video-edit/{id}',[AdminVideoController::class, 'video_edit'])->name('admin_video_edit')->middleware('admin:admin');
Route::post('/admin/video-update/{id}',[AdminVideoController::class, 'video_update'])->name('admin_video_update')->middleware('admin:admin');
Route::get('/admin/video-delete/{id}',[AdminVideoController::class, 'video_delete'])->name('admin_video_delete')->middleware('admin:admin');

// Pages

// About Page

Route::get('/admin/page/about',[AdminPageController::class, 'admin_about_show'])->name('admin_page_about')->middleware('admin:admin');
Route::post('/admin/page/about/update',[AdminPageController::class, 'admin_about_update'])->name('admin_page_about_update')->middleware('admin:admin');

// FAQ Page

Route::get('/admin/page/faq',[AdminPageController::class, 'admin_faq_show'])->name('admin_page_faq')->middleware('admin:admin');
Route::post('/admin/page/faq/update',[AdminPageController::class, 'admin_faq_update'])->name('admin_page_faq_update')->middleware('admin:admin');

// Terms Page

Route::get('/admin/page/terms',[AdminPageController::class, 'admin_terms_show'])->name('admin_page_terms')->middleware('admin:admin');
Route::post('/admin/page/terms/update',[AdminPageController::class, 'admin_terms_update'])->name('admin_page_terms_update')->middleware('admin:admin');

// Privacy Page

Route::get('/admin/page/Privacy',[AdminPageController::class, 'admin_Privacy_show'])->name('admin_page_Privacy')->middleware('admin:admin');
Route::post('/admin/page/Privacy/update',[AdminPageController::class, 'admin_Privacy_update'])->name('admin_page_Privacy_update')->middleware('admin:admin');

// Disclaimer Page

Route::get('/admin/page/disclaimer',[AdminPageController::class, 'admin_disclaimer_show'])->name('admin_page_disclaimer')->middleware('admin:admin');
Route::post('/admin/page/disclaimer/update',[AdminPageController::class, 'admin_disclaimer_update'])->name('admin_page_disclaimer_update')->middleware('admin:admin');

// Login Page

Route::get('/admin/page/login',[AdminPageController::class, 'admin_login_show'])->name('admin_page_login')->middleware('admin:admin');
Route::post('/admin/page/login/update',[AdminPageController::class, 'admin_login_update'])->name('admin_page_login_update')->middleware('admin:admin');

// Contact Page

Route::get('/admin/page/contact',[AdminPageController::class, 'admin_contact_show'])->name('admin_page_contact')->middleware('admin:admin');
Route::post('/admin/page/contact/update',[AdminPageController::class, 'admin_contact_update'])->name('admin_page_contact_update')->middleware('admin:admin');

// FAQ Section

Route::get('/admin/faq-show',[AdminFaqController::class, 'faq_show'])->name('admin_faq_show')->middleware('admin:admin');
Route::get('/admin/faq-create',[AdminFaqController::class, 'faq_create'])->name('admin_faq_create')->middleware('admin:admin');
Route::post('/admin/faq-store',[AdminFaqController::class, 'faq_store'])->name('admin_faq_store')->middleware('admin:admin');
Route::get('/admin/faq-edit/{id}',[AdminFaqController::class, 'faq_edit'])->name('admin_faq_edit')->middleware('admin:admin');
Route::post('/admin/faq-update/{id}',[AdminFaqController::class, 'faq_update'])->name('admin_faq_update')->middleware('admin:admin');
Route::get('/admin/faq-delete/{id}',[AdminFaqController::class, 'faq_delete'])->name('admin_faq_delete')->middleware('admin:admin');

// Subscriber Section

Route::get('/admin/subscriber/show',[AdminSubscriberController::class, 'subscriber_show'])->name('admin_subscribers')->middleware('admin:admin');
Route::get('/admin/subscriber/send-email',[AdminSubscriberController::class, 'subscriber_send_email'])->name('admin_subscriber_send_email')->middleware('admin:admin');
Route::post('/admin/subscriber/send-email/submit',[AdminSubscriberController::class, 'subscriber_send_email_submit'])->name('admin_subscriber_send_email_submit')->middleware('admin:admin');

// LiveChannel

Route::get('/admin/live-channel-show',[AdminLiveChannelController::class, 'live_channel_show'])->name('admin_live_channel_show')->middleware('admin:admin');
Route::get('/admin/live-channel-create',[AdminLiveChannelController::class, 'live_channel_create'])->name('admin_live_channel_create')->middleware('admin:admin');
Route::post('/admin/live-channel-store',[AdminLiveChannelController::class, 'live_channel_store'])->name('admin_live_channel_store')->middleware('admin:admin');
Route::get('/admin/live-channel-edit/{id}',[AdminLiveChannelController::class, 'live_channel_edit'])->name('admin_live_channel_edit')->middleware('admin:admin');
Route::post('/admin/live-channel-update/{id}',[AdminLiveChannelController::class, 'live_channel_update'])->name('admin_live_channel_update')->middleware('admin:admin');
Route::get('/admin/live-channel-delete/{id}',[AdminLiveChannelController::class, 'live_channel_delete'])->name('admin_live_channel_delete')->middleware('admin:admin');

// OnlinePoll

Route::get('/admin/online-poll/show',[AdminOnlinePollController::class, 'online_poll_show'])->name('admin_online_poll_show')->middleware('admin:admin');
Route::get('/admin/online-poll/create',[AdminOnlinePollController::class, 'online_poll_create'])->name('admin_online_poll_create')->middleware('admin:admin');
Route::post('/admin/online-poll/store',[AdminOnlinePollController::class, 'online_poll_store'])->name('admin_online_poll_store')->middleware('admin:admin');
Route::get('/admin/online-poll/edit/{id}',[AdminOnlinePollController::class, 'online_poll_edit'])->name('admin_online_poll_edit')->middleware('admin:admin');
Route::post('/admin/online-poll/update/{id}',[AdminOnlinePollController::class, 'online_poll_update'])->name('admin_online_poll_update')->middleware('admin:admin');
Route::get('/admin/online-poll/delete/{id}',[AdminOnlinePollController::class, 'online_poll_delete'])->name('admin_online_poll_delete')->middleware('admin:admin');

// Social Icon

Route::get('/admin/social-item/show',[AdminSocialItemController::class, 'social_item_show'])->name('admin_social_item_show')->middleware('admin:admin');
Route::get('/admin/social-item/create',[AdminSocialItemController::class, 'social_item_create'])->name('admin_social_item_create')->middleware('admin:admin');
Route::post('/admin/social-item/store',[AdminSocialItemController::class, 'social_item_store'])->name('admin_social_item_store')->middleware('admin:admin');
Route::get('/admin/social-item/edit/{id}',[AdminSocialItemController::class, 'social_item_edit'])->name('admin_social_item_edit')->middleware('admin:admin');
Route::post('/admin/social-item/update/{id}',[AdminSocialItemController::class, 'social_item_update'])->name('admin_social_item_update')->middleware('admin:admin');
Route::get('/admin/social-item/delete/{id}',[AdminSocialItemController::class, 'social_item_delete'])->name('admin_social_item_delete')->middleware('admin:admin');

// Author Section

Route::get('/admin/author/show',[AdminAuthorController::class, 'author_show'])->name('admin_author_show')->middleware('admin:admin');
Route::get('/admin/author/create',[AdminAuthorController::class, 'author_create'])->name('admin_author_create')->middleware('admin:admin');
Route::post('/admin/author/store',[AdminAuthorController::class, 'author_store'])->name('admin_author_store')->middleware('admin:admin');
Route::get('/admin/author/edit/{id}',[AdminAuthorController::class, 'author_edit'])->name('admin_author_edit')->middleware('admin:admin');
Route::post('/admin/author/update/{id}',[AdminAuthorController::class, 'author_update'])->name('admin_author_update')->middleware('admin:admin');
Route::get('/admin/author/delete/{id}',[AdminAuthorController::class, 'author_delete'])->name('admin_author_delete')->middleware('admin:admin');

// Language Section

Route::get('/admin/language-show',[AdminLanguageController::class, 'language_show'])->name('admin_language_show')->middleware('admin:admin');
Route::get('/admin/language-create',[AdminLanguageController::class, 'language_create'])->name('admin_language_create')->middleware('admin:admin');
Route::post('/admin/language-store',[AdminLanguageController::class, 'language_store'])->name('admin_language_store')->middleware('admin:admin');
Route::get('/admin/language-edit/{id}',[AdminLanguageController::class, 'language_edit'])->name('admin_language_edit')->middleware('admin:admin');
Route::post('/admin/language-update/{id}',[AdminLanguageController::class, 'language_update'])->name('admin_language_update')->middleware('admin:admin');
Route::get('/admin/language-delete/{id}',[AdminLanguageController::class, 'language_delete'])->name('admin_language_delete')->middleware('admin:admin');

// Language update detail Section

Route::get('/admin/language/update/detail/{id}',[AdminLanguageController::class, 'update_detail'])->name('admin_language_update_detail')->middleware('admin:admin');
Route::post('/admin/language/update/detail-submit{id}',[AdminLanguageController::class, 'update_detail_submit'])->name('admin_language_update_detail_submit')->middleware('admin:admin');


































