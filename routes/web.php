<?php
/*========================================================================
==========================================================================
============================admin route===================================
==========================================================================
========================================================================*/

Route::group(['prefix' => 'admin',  'middleware' => 'admins'], function() {


/*=====================Admin Control Route==================================*/               
    
Route::get('/control','AdminController@edit');
Route::put('/update','AdminController@updateAdmin')->name('admin.update');

/*=====================Categories & Home Route=================================*/   
    Route::get('/', 'CategoriesController@index');
    Route::post('/', 'CategoriesController@store');
    Route::put('/{id}', 'CategoriesController@update');
    Route::delete('/{id}', 'CategoriesController@destroy');
/*=====================products Route================================*/
    Route::resource('/products','ProductsController');
//    Route::get('/products','ProductsController@index');
    Route::get('/api-products','ProductsController@apiProducts')->name('api.products');
//    Route::post('/products','ProductsController@store');
/*=====================product Route=================================*/       
//    Route::put('/products/{id}', 'ProductsController@update');
//    Route::delete('/products/{id}', 'ProductsController@destroy');
//    Route::get('/product_detail/{id}','ProductsController@show');
/*=====================users Route===================================*/       
    Route::get('/users/{filterId?}', 'AdminController@allUsers');
    Route::put('/users/{id}', 'AdminController@updateuser');
    Route::delete('/users/{id}', 'AdminController@destroy');
    
/*=====================users & profile Route=========================*/           
Route::get('/profile/{id}', 'AdminController@profile');

/*=====================Orders Route==================================*/               
    Route::get('/orders','OrdersController@index');
        
});




/*=====================login &logout Route==================================*/               
Route::get('admin/login', 'AdminController@showlogin');
Route::get('admin/admin-sign-out', 'AdminController@logoutAdmin');
Route::post('admin/login', 'AdminController@login');

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