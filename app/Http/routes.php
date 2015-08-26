<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', ['as' => 'admin.categories', 'uses' => 'AdminCategoriesController@index']);
        Route::get('create', ['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('store', ['as' => 'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('show/{id}', ['as' => 'admin.categories.show', 'uses' => 'AdminCategoriesController@show']);
        Route::get('edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('update/{id}', ['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@update']);
        Route::delete('destroy/{id}', ['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', ['as' => 'admin.products', 'uses' => 'AdminProductsController@index']);
        Route::get('create', ['as' => 'admin.products.create', 'uses' => 'AdminProductsController@create']);
        Route::post('store', ['as' => 'admin.products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('show/{id}', ['as' => 'admin.products.show', 'uses' => 'AdminProductsController@show']);
        Route::get('edit/{id}', ['as' => 'admin.products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('update/{id}', ['as' => 'admin.products.update', 'uses' => 'AdminProductsController@update']);
        Route::delete('destroy/{id}', ['as' => 'admin.products.destroy', 'uses' => 'AdminProductsController@destroy']);
    });

    //Route::get('categories', 'AdminCategoriesController@index');
    //Route::get('products', 'AdminProductsController@index');
});

//Route::get('admin/categories', 'AdminCategoriesController@index');

//Route::get('admin/products', 'AdminProductsController@index');


//Route::get('produtos', ['as' => 'produtos'], function () {
//    return 'Produtos';
//});
// echo route('produtos');
// redirect()->route('produtos');
// echo Route::currentRouteName();


//Route::pattern('id', '[0-9]+');

//Route::get('user/{id?}', function ($id = null) {
//    if ($id) {
//        return 'ID = ' . $id;
//    }
//    return 'Não possui ID';
//})->where('id', '[0-9]+');


//Route::macth(['get', 'post'], '/exemplo', function () {
//    return 'Olá';
//});

//Route::any('/exemplo1', function () {
//    return 'Olá';
//});


// Form Method Spoofing

// HTML forms do not support PUT, PATCH or DELETE actions. So, when defining PUT,
// PATCH or DELETE routes that are called from an HTML form, you will need to add a hidden
// _method field to the form. The value sent with the _method field will be used as the HTTP
// request method:

//<form action="/foo/bar" method="POST">
//    <input type="hidden" name="_method" value="PUT">
//    <input type="hidden" name="_token" value="{{ csrf_token() }}">
//</form>