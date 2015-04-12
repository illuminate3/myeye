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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(array('prefix' => 'adminmaster','middleware'=>['auth','adminAuth']),function(){
    /*,'before'=>'AdminFilter'*/

	Route::get('/', 'AdminHomePageController@index');

	Route::get('/framesAll', 'AdminFrameController@frames');
    Route::get('/frames/active/{id}', 'AdminFrameController@active');
    Route::post('/frames/activeAll', 'AdminFrameController@activeAll');
    Route::post('/frames/deleteAll', 'AdminFrameController@deleteAll');
    Route::resource('/frames','AdminFrameController');

    Route::get('/productsAll', 'AdminProductController@products');
    Route::get('/products/active/{id}', 'AdminProductController@active');
    Route::post('/products/activeAll', 'AdminProductController@activeAll');
    Route::post('/products/deleteAll', 'AdminProductController@deleteAll');
    Route::resource('/products','AdminProductController');

    Route::get('/materialsAll', 'AdminMaterialController@materials');
    Route::get('/materials/active/{id}', 'AdminMaterialController@active');
    Route::post('/materials/activeAll', 'AdminMaterialController@activeAll');
    Route::post('/materials/deleteAll', 'AdminMaterialController@deleteAll');
    Route::post('/materials/editUpload/{id}', 'AdminMaterialController@editUpload');
    Route::resource('/materials','AdminMaterialController');


    Route::get('/productsDetail/show/{id}', 'AdminProductDetailController@details');
    Route::get('/productsDetail/product/{id}', 'AdminProductDetailController@showProductsDetails');
    Route::get('/productsDetail/getProduct/{id}', 'AdminProductDetailController@getProduct');
    Route::get('/productsDetail/active/{id}', 'AdminProductDetailController@active');
    Route::post('/productsDetail/activeAll', 'AdminProductDetailController@activeAll');
    Route::post('/productsDetail/deleteAll', 'AdminProductDetailController@deleteAll');
    Route::post('/productsDetail/editUpload/{id}', 'AdminProductDetailController@editUpload');
    Route::resource('/productsDetail','AdminProductDetailController');

    Route::get('/lensesAll', 'AdminLensesController@lenses');
    Route::get('/lenses/active/{id}', 'AdminLensesController@active');
    Route::post('/lenses/activeAll', 'AdminLensesController@activeAll');
    Route::post('/lenses/deleteAll', 'AdminLensesController@deleteAll');
    Route::post('/lenses/editUpload/{id}', 'AdminLensesController@editUpload');
    Route::resource('/lenses','AdminLensesController');


    Route::get('/sunglassesLenses/show', 'AdminSunglassesLensesController@details');
    Route::get('/sunglassesLenses/lensesAll/{id}', 'AdminSunglassesLensesController@lensesAll');
//    Route::get('/sunglassesLenses/getProduct/{id}', 'AdminSunglassesLensesController@getProduct');
    Route::get('/sunglassesLenses/active/{id}', 'AdminSunglassesLensesController@active');
    Route::post('/sunglassesLenses/activeAll', 'AdminSunglassesLensesController@activeAll');
    Route::post('/sunglassesLenses/deleteAll', 'AdminSunglassesLensesController@deleteAll');
    Route::post('/sunglassesLenses/editUpload/{id}', 'AdminSunglassesLensesController@editUpload');
    Route::resource('/sunglassesLenses','AdminSunglassesLensesController');



});
