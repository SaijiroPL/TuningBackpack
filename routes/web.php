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

Route::get('/', function () {
    return view('welcome');
});

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
