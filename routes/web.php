<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// userpage routes


Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/category', [HomeController::class, 'category']);
Route::get('/home_details/{home}/details', 'App\Http\Controllers\HomeController@home_details')->name('homeDetails');
Route::get('/application_form/{form}/form', 'App\Http\Controllers\HomeController@application_form')->name('application_form');
Route::get('/schedule_home/{schedule}/schedule', 'App\Http\Controllers\HomeController@schedule_home')->name('schedule_home');
Route::post('/schedule_appointment/{home}/schedule', 'App\Http\Controllers\HomeController@schedule_appointment')->name('schedule_appointment');
Route::get('/application_status/view', 'App\Http\Controllers\HomeController@application_status')->name('application_status');
Route::get('/appointment_status/view', 'App\Http\Controllers\HomeController@appointment_status')->name('appointment_status');
Route::get('/delete_application/{delete}/delete', 'App\Http\Controllers\HomeController@delete_application')->name('delete_application');
Route::get('/make_payment/{pay}/payment', 'App\Http\Controllers\HomeController@make_payment')->name('make_payment');
Route::post('/process_payment{app}/{total}/paid', 'App\Http\Controllers\HomeController@process_payment')->name('process_payment');
Route::get('/membership/view', 'App\Http\Controllers\HomeController@membership')->name('membership');

Route::post('/send_messages/send', 'App\Http\Controllers\HomeController@send_messages')->name('send_messages');
Route::get('/received_messages/view', 'App\Http\Controllers\HomeController@received_messages')->name('received_messages');
Route::get('/message_delete/{msg}/delete', 'App\Http\Controllers\HomeController@message_delete')->name('message_delete');
Route::post('/comm_post/post', 'App\Http\Controllers\HomeController@comm_post')->name('comm_post');
Route::post('/msg_adm/{user}/message', 'App\Http\Controllers\HomeController@msg_adm')->name('msg_adm');
Route::get('/search/search', 'App\Http\Controllers\HomeController@search')->name('search');
Route::get('/filter/{category}/filter', 'App\Http\Controllers\HomeController@filter')->name('filter');

Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/community', [HomeController::class, 'community']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/blogstory', [HomeController::class, 'blogstory']);
Route::get('/communityreplies', [HomeController::class, 'communityreplies']);




Route::post('/rent_application/{home_id}/apply', 'App\Http\Controllers\HomeController@rent_application')->name('rent_application');




// adminpage routes

Route::get('/admlogout', [AdminController::class, 'admlogout']);
Route::match(['GET', 'POST'], '/view_slideshow', [AdminController::class, 'view_slideshow']);
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::get('/view_amenities', [AdminController::class, 'view_amenities']);
Route::get('/new_home', [AdminController::class, 'new_home']);
Route::get('/view_about', [AdminController::class, 'view_about']);
Route::get('/view_contact', [AdminController::class, 'view_contact']);
Route::post('/update_slider', [AdminController::class, 'update_slider']);
Route::get('/delete_slider/{id}', [AdminController::class, 'delete_slider']);
Route::match(['GET', 'POST'], '/add_county', [AdminController::class, 'add_county']);
Route::match(['GET', 'POST'], '/add_region', [AdminController::class, 'add_region']);
Route::match(['GET', 'POST'], '/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::match(['GET', 'POST'], '/add_amenity', [AdminController::class, 'add_amenity']);
Route::get('/delete_amenity/{id}', [AdminController::class, 'delete_amenity']);
Route::match(['GET', 'POST'], '/add_home', [AdminController::class, 'add_home']);
Route::get('/view_homes', [AdminController::class, 'view_homes']);
Route::get('/show_home/{id}', [AdminController::class, 'show_home']);
Route::get('/delete_home/{id}', [AdminController::class, 'delete_home']);

Route::post('/update_home/{home}/update', 'App\Http\Controllers\AdminController@update_home')->name('update_home');

Route::get('/sent_applications/view', 'App\Http\Controllers\AdminController@sent_applications')->name('sent_applications');
Route::get('/sent_appointments/view', 'App\Http\Controllers\AdminController@sent_appointments')->name('sent_appointments');

Route::get('/approve_application/{approve}/approved', 'App\Http\Controllers\AdminController@approve_application')->name('approve_application');
Route::get('/decline_application/{decline}/declined', 'App\Http\Controllers\AdminController@decline_application')->name('decline_application');

Route::get('/approve_appointment/{approve}/approved', 'App\Http\Controllers\AdminController@approve_appointment')->name('approve_appointment');
Route::get('/decline_appointment/{decline}/declined', 'App\Http\Controllers\AdminController@decline_appointment')->name('decline_appointment');

Route::get('/tenants/view', 'App\Http\Controllers\AdminController@tenants')->name('tenants');
Route::get('/messages/view', 'App\Http\Controllers\AdminController@messages')->name('messages');
Route::post('/adm_reply/{user}/reply', 'App\Http\Controllers\AdminController@adm_reply')->name('adm_reply');
