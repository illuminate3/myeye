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

//Route::get('/', 'WelcomeController@index');
Route::get('pages/{title}', 'PagesController@index');
Route::post('pages/{title}', 'PagesController@store');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('eyewear', 'EyeWearController@getAll');
Route::get('sunEyewear', 'SunEyeWearController@getAll');
Route::get('rxEyewearProducts/{id}', 'EyeWearController@eyewearsWithId');
Route::get('sun-eyewearProducts/{id}', 'SunEyeWearController@eyewearsWithId');
Route::get('eyewear-product', 'EyeWearController@showProduct');
Route::get('sunEyewear-product', 'SunEyeWearController@showProduct');
Route::resource('rxEyewear', 'EyeWearController');
Route::get('sun-eyewear/lenses/{id}', 'SunEyeWearController@lenses');
Route::resource('sun-eyewear', 'SunEyeWearController');
Route::get('MaterialEyewear/materials', 'MaterialEyewearController@materials');

/*
 * orders
 */
Route::get('orders/{product_id}/{sunglass_id}',array('middleware' => 'auth','uses'=>'OrderController@index'));

/*
 * Admin Login
 */
Route::get('adminLogin',array('middleware' => 'guest','uses'=>'SessionController@login'));
Route::post('adminLogin','SessionController@valid');

/*
 * Shop Basket
 */
Route::get('/shopAll', array('middleware' => 'authOrder','uses'=>'ShopController@shop'));
Route::group(array('middleware' => 'authOrder'), function()
{
    Route::resource('/shop','ShopController');
});

/*
 * Purchase; final shop
 */
Route::get('/purchase', array('middleware' => ['auth','userDetail'],'uses'=>'PurchaseController@store'));
Route::post('/userDetail', array('middleware' => ['auth'],'uses'=>'PurchaseController@updateUser'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(array('middleware' => 'auth'), function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
});




Route::group(array('prefix' => 'adminmaster','middleware'=>['adminAuth']),function(){
    /*,'before'=>'AdminFilter'*/

	Route::get('/', 'AdminHomePageController@index');
	Route::post('/mainSlideShow', 'AdminHomePageController@storeSlideShow');
	Route::get('/secondSlideShow', 'AdminHomePageController@secondSlideShow');
	Route::post('/mainSlideShowEdit/{id}', 'AdminHomePageController@updateSlideShow');
	Route::get('/mainSlideShow', 'AdminHomePageController@getSlideShowImages');
	Route::delete('/mainSlideShow/{id}', 'AdminHomePageController@deleteSlideShowImage');

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
    Route::get('/productsDetail/activeSlideShow/{id}', 'AdminProductDetailController@activeSlideShow');
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
/*
 * Admin Purchase
 *
*/
    Route::get('/ordersAll','SalesController@ordersAll');
    Route::post('/acceptedOrder/{id}','SalesController@acceptedOrder');
    Route::resource('/sales','SalesController');
    Route::resource('/users','UserController');
});
