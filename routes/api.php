<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'jwt.auth'], function () {
    //show,update
    Route::resource('users', 'UserAPIController',['except' => [
        'store','index','delete'
    ]]);

    //show,store
    Route::resource('aset_takings', 'AsetTakingAPIController',['except' => [
        'update','index','delete','show'
    ]]);

    //show
    Route::get('data_asets/show', 'DataAsetAPIController@showByBarcode');

    Route::get('kondisi_asets', 'KondisiAsetAPIController@index');

    Route::get('users/show', 'UserAPIController@show');
});


/*

//Route::get('users/show','UserAPIController@show');

/*Route::post('users/update','UserAPIController@update');*/

/*Route::post('users/password','UserAPIController@changePassword');*/

Route::post('/vendors',['as'=>'get_vendor','uses'=>'VendorController@getVendor']);

Route::post('token','AuthenticateAPIController@authenticate');