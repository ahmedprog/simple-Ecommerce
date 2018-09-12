<?php
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

