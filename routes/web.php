<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('client.homepage.index');
});

Route::group(['prefix'=> '/client/','namespace'=> 'Client','as'=>'client.'], function () {
    Route::resource('product', 'ProductController');
    Route::resource('homepage','HomepageController');
    Route::resource('category','CategoriesController');
    Route::resource('cart','CartController',['except'=> ['update']]);
    Route::patch('cart/update','CartController@update')->name('cart.update');

});
Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=> '/client/','namespace'=> 'Client','as'=>'client.'], function () {
        Route::resource('order','OrderController');
        Route::resource('orderdetails', 'OrderDetailsController');
        Route::post('vnpay','OrderController@vnPay')->name('pVnPay');
        Route::post('stpayment','OrderController@setupVnPay')->name('setupPayment');
        Route::get('result','OrderController@result')->name('result');
        Route::resource('client','ClientController');
        Route::resource('comment','CommentController');
    });
});

Route::get('register', 'AuthController@register' )->name('register');
Route::post('register', 'AuthController@pRegister' )->name('pRegister');
Route::get('login','AuthController@login')->name('login');
Route::post('login','AuthController@pLogin')->name('pLogin');
Route::get('logout','AuthController@logout')->name('logout');

Route::group(['middleware' => 'admin.login'], function () {
    Route::group(['prefix'=>'/admin/','namespace'=>'Admin','as'=>'admin.'], function () {
        Route::resource('adminhome','HomeAdminController');
        Route::resource('admin', 'AdminController');
        Route::resource('categories', 'CategoriesController');
        Route::resource('products', 'ProductController');
        Route::resource('user', 'UserController');
        Route::resource('orders', 'OrderController');    
        Route::resource('comments', 'CommentController');   
        Route::resource('logistic','LogisticController'); 
        
    });
});

Route::get('/admin/login','Admin\AdminLoginController@adminLogin')->name('admin.login');
Route::post('/admin/login','Admin\AdminLoginController@pAdminLogin')->name('admin.plogin');
Route::get('/admin/logout','Admin\AdminLoginController@adminLogout')->name('admin.logout');
Route::get('/filter','Client\FilterController@index')->name('client.filter.index');