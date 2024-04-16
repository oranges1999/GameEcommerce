<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', 'Api\SearchController@search')->name('search.search');
Route::get('/city','Api\ProvincesController@city')->name('province.city');
Route::get('/district','Api\ProvincesController@district')->name('province.district');
Route::get('/ward','Api\ProvincesController@ward')->name('province.ward');

Route::get('/filter/index','Api\ApiFilterController@index')->name('client.apiFilter.index');
Route::get('/filter/show','Api\ApiFilterController@show')->name('client.apiFilter.show');


