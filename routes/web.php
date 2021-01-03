<?php

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

Route::get('/admin', function () {
    return redirect(url('admin/login'));
});

Route::group(['middleware' => 'web', 'prefix'=>'admin'], function(){

	Route::get('login', '\App\Http\Controllers\Auth\Admin\LoginController@showLoginForm')->name('admin.auth.show.login');
	Route::post('login', '\App\Http\Controllers\Auth\Admin\LoginController@login')->name('admin.auth.login');
	Route::post('logout', '\App\Http\Controllers\Auth\Admin\LoginController@logout')->name('admin.auth.logout');
	Route::get('password/reset', '\App\Http\Controllers\Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.auth.show.password.reset');
	Route::post('password/reset', '\App\Http\Controllers\Auth\Admin\ResetPasswordController@reset')->name('admin.auth.password.reset');
	Route::get('password/reset/{token}', '\App\Http\Controllers\Auth\Admin\ResetPasswordController@showResetForm')->name('admin.auth.password.reset.form');
	Route::post('password/email', '\App\Http\Controllers\Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.auth.password.email');

    Route::get('company/{company}/switch-account','\App\Http\Controllers\Auth\Admin\LoginController@switchAsCompany');
});

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/admin', function () {
    return redirect(url('admin/login'));
});

Route::get('/customer', function () {
    return redirect(url('customer/dashboard'));
});
Route::get('/user-register/', '\App\Http\Controllers\UserRegisterController@register')->name('users_registers');
Route::post('/user-register/', '\App\Http\Controllers\UserRegisterController@create')->name('users_registers');
Route::get('/browser', '\App\Http\Controllers\UserRegisterController@browser')->name('browser');
Route::get('/browser/result', '\App\Http\Controllers\UserRegisterController@browserResult')->name('browser.result');
Route::get('/browser/category', '\App\Http\Controllers\UserRegisterController@browserCategory')->name('browser.category');
