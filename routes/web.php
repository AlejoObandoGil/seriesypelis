<?php

Route::get('email', function(){
    return new App\Mail\LoginCredentials(App\User::first(), 'asd123');
});
// estaticas
Route::get('/', 'PagesController@home')->name('home');
Route::get('nosotros', 'PagesController@about')->name('pages.about');
Route::get('archivo', 'PagesController@archive')->name('pages.archive');
Route::get('contact', 'PagesController@contact')->name('pages.contact');

// dianmicas y filtros de posts
Route::get('/{post}/{season?}/{chapter?}', 'PostsController@show')->name('posts.show');
Route::get('categoria/{category}', 'CategoryController@show')->name('category.show');
Route::get('hashtag/{tag}', 'TagController@show')->name('tag.show');

// admin
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'],

    function()
    {
        Route::get('/', 'AdminController@index')->name('admin.admin');

        Route::resource('posts', 'PostController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('users', 'UserController', ['as' => 'admin']);
        Route::resource('roles', 'RoleController', ['as' => 'admin']);

        Route::middleware(['role:Admin|Moderador'])
            ->put('users/{user}/roles', 'UserRolController@update')
            ->name('admin.users.roles.update');
        Route::middleware(['role:Admin|Moderador'])
            ->put('users/{user}/permissions', 'UserPermissionController@update')
            ->name('admin.users.permissions.update');

        Route::post('posts/{post}/photo', 'PhotoController@store')->name('admin.posts.photo.store');
        Route::delete('photos/{photo}', 'PhotoController@destroy')->name('admin.photos.destroy');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
if ($options['register'] ?? true) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
}

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
