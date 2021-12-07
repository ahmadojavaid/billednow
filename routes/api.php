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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => ['json.response']], function () {

    Route::group([
        'middleware' => 'api',
        'prefix' => 'password'
    ], function () {
        Route::post('create', 'Api\Auth\PasswordResetController@create');
        Route::get('find/{token}', 'Api\Auth\PasswordResetController@find');
        Route::post('reset', 'Api\Auth\PasswordResetController@reset');
    });

    Route::middleware('auth:api')->get('/userDetails', function (Request $request) {
        return $request->user();
    });

    // public routes
    Route::post('/login', 'Api\Auth\LoginController@login')->name('login.api');
    Route::post('/register', 'Api\Auth\RegisterController@register')->name('register.api');
    Route::post('/forgot-password', 'Api\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('stripe-check', 'HomeController@index');
    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'Api\Auth\LoginController@logout')->name('register.api');
    });

});
