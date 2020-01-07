<?php

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
    return view('auth/admin-login');
});

Auth::routes();

Route::resource('users', 'AdminController');
Route::resource('delivery', 'DeliveryController');

Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');;

  Route::get('/password/confirm', 'Auth\AdminConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
  Route::post('password/confirm', 'Auth\AdminConfirmPasswordController@confirm');
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

  Route::get('change-password', 'Auth\ChangePasswordController@index')->name('change.current.password');
  Route::post('change-password', 'Auth\ChangePasswordController@store')->name('change.password');

  Route::get('/create-user', 'AdminController@create')->name('user.create');
  Route::post('/create-user', 'AdminController@store')->name('user.store');

  Route::post('/user-delete/{id}', 'AdminController@destroy')->name('user.destroy');

  Route::get('/user-edit/{id}', 'AdminController@edit')->name('user.edit');
  Route::post('/user-update/{id}', 'AdminController@update')->name('user.update');

  Route::get('/current-deliveries', 'DeliveryController@index')->name('admin.deliveries');

  Route::get('/create-delivery', 'DeliveryController@create')->name('delivery.create');

  Route::post('/delivery-edit/{id}', 'DeliveryController@destroy')->name('delivery.destroy');

  Route::get('/delivery-edit/{id}', 'DeliveryController@edit')->name('delivery.edit');
  Route::post('/delivery-update/{id}', 'DeliveryController@update')->name('delivery.update');
});
