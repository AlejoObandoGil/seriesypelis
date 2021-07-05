<?php

Route::get('/', 'PagesController@home');
Route::get('blog/{post}', 'PostsController@show');

Route::group([
    // 'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'],

function(){
    Route::get('posts', 'PostController@index')->name('admin.posts.index');
    Route::get('admin', 'AdminController@index')->name('admin.admin');
    Route::get('create', 'PostController@create')->name('admin.posts.create');
    Route::post('posts', 'PostController@store')->name('admin.posts.store');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// if ($options['register'] ?? true) {
//     Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//     Route::post('register', 'Auth\RegisterController@register');
// }

// Password Reset Routes...
Route::resetPassword();

// Password Confirmation Routes...
Route::confirmPassword();

// Email Verification Routes...
Route::emailVerification();
/**
 * Register the typical reset password routes for an application.
 *
 * @return void
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
/**
 * Register the typical confirm password routes for an application.
 *
 * @return void
 */
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
/**
 * Register the typical email verification routes for an application.
 *
 * @return void
 */
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
