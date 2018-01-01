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
//Auth::routes();

<<<<<<< HEAD
Route::get('/', 'HomeController@index');
Route::get('/shops', 'MainController@shops');
Route::get('/recent', 'MainController@recent');
Route::get('/popular', 'MainController@popular');
Route::get('/discount', 'MainController@discount');
Route::get('/search', 'MainController@search');
Route::get('/product/{id}', 'MainController@product');
Route::get('/order/cek', 'MainController@orderCek');
Route::post('/order/cek', 'MainController@orderCek');
Route::get('/order/proof', 'MainController@orderProof');
Route::get('/category', 'MainController@category');
Route::get('/cart', 'MainController@cart');
Route::get('/purchase/{idcart}', 'MainController@purchase');
Route::get('/purchase/all', 'MainController@purchaseAll');
Route::get('/signin', 'MainController@signin');
Route::get('/signup', 'MainController@signup');
Route::get('/cart', 'MainController@cart');
Route::post('/ajax/add-to-cart', 'AjaxController@addToCart');
Route::post('/ajax/on-change-quantity-cart-item', 'AjaxController@onChangeQuantityOfCartItem');
Route::get('/ajax/on-change-quantity-cart-item', 'AjaxController@onChangeQuantityOfCartItem');
Route::post('/checkout/step1', 'MainController@checkoutStep1');
Route::post('/checkout/step2', 'MainController@checkoutStep2');
Route::get('/ajax/add-csa', 'AjaxController@addCSA');
Route::post('/ajax/add-csa', 'AjaxController@addCSA');
Route::post('/ajax/get-csa-by-id', 'AjaxController@getCSAbyId');
// TODO: hapus
Route::get('/ajax/get-all-csa', 'AjaxController@getAllCSA');
Route::post('/ajax/get-all-csa', 'AjaxController@getAllCSA');
=======
/*
|--------------------------------------------------------------------------
| Public route
|--------------------------------------------------------------------------
|
*/
Route::get('/',                     'HomeController@index');
Route::get('/home',                 'HomeController@index');
Route::get('/shops',                'MainController@shops');
Route::get('/recent',               'MainController@recent');
Route::get('/popular',              'MainController@popular');
Route::get('/top',                  'MainController@top');
Route::get('/search',               'MainController@search');
Route::get('/product/{id}',         'MainController@product');
Route::get('/category/{ctr}',       'MainController@category');
Route::get('/customer/{idcustomer}', 'CustomerController@customer');

Route::get('/login',     'Customer\Auth\LoginController@showLoginForm');
Route::post('/login',    'Customer\Auth\LoginController@login');
Route::get('/register',  'Customer\Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Customer\Auth\RegisterController@register');

//Route::post('/admin/login', 'LoginController@loginAdmin');
//Route::get('/admin/logout', 'LoginController@logoutAdmin');
//Route::get('/admin/login', 'Admin\Auth\LoginController@loginAdmin');
Route::get('/admin/login',      'Admin\Auth\LoginController@showLoginForm');
Route::post('/admin/login',     'Admin\Auth\LoginController@login');
Route::get('/admin/register',   'Admin\Auth\RegisterController@showRegistrationForm');
Route::post('/admin/register',  'Admin\Auth\RegisterController@register');

/*
|--------------------------------------------------------------------------
| Customer authenticated only
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'customer_auth'], function(){
    Route::get('/order/check',    'Customer\OrderController@check');
    Route::post('/order/check',   'Customer\OrderController@check');
    Route::get('/order/proof',  'Customer\OrderController@proof');

    Route::get('/cart',             'Customer\CartController@index');
    Route::post('/checkout/step1',  'Customer\CheckoutController@checkoutStep1');
    Route::post('/checkout/step2',  'Customer\CheckoutController@checkoutStep2');

    Route::post('/ajax/add-to-cart', 'AjaxController@addToCart');
    Route::post('/ajax/update-cart', 'AjaxController@updateCart');
    Route::get('/ajax/update-cart', 'AjaxController@updateCart');
    Route::post('/ajax/on-change-quantity-cart-item', 'AjaxController@onChangeQuantityOfCartItem');
    Route::get('/ajax/on-change-quantity-cart-item', 'AjaxController@onChangeQuantityOfCartItem');
>>>>>>> 6d86dfc34b97162754116fdaa3f89e39562f430e

    Route::get('/ajax/add-csa', 'AjaxController@addCSA');
    Route::post('/ajax/add-csa', 'AjaxController@addCSA');
    Route::post('/ajax/get-csa-by-id', 'AjaxController@getCSAbyId');
    // TODO: hapus
    Route::get('/ajax/get-all-csa', 'AjaxController@getAllCSA');
    Route::post('/ajax/get-all-csa', 'AjaxController@getAllCSA');

    Route::get('/customer', 'Customer\CustomerController@index');
    Route::get('/logout',   'Customer\Auth\LoginController@logout');
});

/*
|--------------------------------------------------------------------------
| Admin authenticated only
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'admin_auth'], function(){
    Route::get('/admin/logout',                 'Admin\Auth\LoginController@logout');

    Route::get('/admin',                        'Admin\AdminController@index');
    Route::get('/admin/dashboard',              'Admin\AdminController@dashboard');
    Route::get('/admin/post',                   'Admin\AdminController@post');
    Route::get('/admin/categories',             'Admin\AdminController@categories');
    Route::get('/admin/orders',                 'Admin\AdminController@orders');
    Route::get('/admin/customers',              'Admin\AdminController@customers');
    Route::get('/admin/products',               'Admin\AdminController@products');
    Route::get('/admin/setting',                'Admin\AdminController@setting');
    Route::get('/admin/info',                   'Admin\AdminController@info');
    Route::get('/admin/profile',                'Admin\AdminController@profile');
    Route::get('/admin/customer/{idcustomer}',  'Admin\AdminController@customer');

<<<<<<< HEAD
//product
Route::post('/product/post', 'PostController@product');
Route::post('/product/image', 'PostController@image');
Route::post('/product/size', 'PostController@size');
Route::post('/product/color', 'PostController@color');
Route::post('/product/settingup', 'PostController@settingup');

//category
Route::get('/admin/category/get', 'CategoryController@get');
Route::post('/admin/category/add', 'CategoryController@addParent');
Route::post('/admin/category/delete', 'CategoryController@delete');
Route::post('/admin/category/addChild', 'CategoryController@addChild');
=======
    //posting product
    Route::post('/product/post',        'Admin\PostController@product');
    Route::post('/product/image',       'Admin\PostController@image');
    Route::post('/product/size',        'Admin\PostController@size');
    Route::post('/product/color',       'Admin\PostController@color');
    Route::post('/product/settingup',   'Admin\PostController@settingup');
});
>>>>>>> 6d86dfc34b97162754116fdaa3f89e39562f430e
