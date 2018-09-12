<?php
/*========================================================================
==========================================================================
============================admin route===================================
==========================================================================
========================================================================*/



/*========================================================================
==========================================================================
============================website route==================================
==========================================================================
========================================================================*/

Route::group(['prefix' => '/',  'middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/products','ProductsController@indexWeb');
    Route::get('/levels','LevelController@index');
    Route::put('/updataMobile', 'UserController@updateMobile')->name('mobile');
    Route::put('/updataPassword', 'UserController@updatePassword')->name('password.update');
 
    Route::post('/product/order/{id}','OrdersController@create');

    Route::get('/tree',function(){
        return view('tree');
    });
    Route::get('/payment','PaymentController@index');
});



/*=============================================================================
======Authentication Routes...=================================================
==========================Registration Routes...===============================
=========================================Password Reset Routes...==============
=============================================================================*/
// Auth::routes();
//Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');




//for test
Route::get('/test','TestController@test');