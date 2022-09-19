<?php

use App\Http\Controllers\Api\sectionsController;
use App\Http\Controllers\Api\discountsController;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login','AuthController@login');
    Route::post('verify', 'AuthController@verify');
    Route::post('check_code', 'AuthController@check_code');
    Route::post('register','AuthController@register');
    Route::post('forget_password','AuthController@forget_password');
//    Route::post('check_reset_code','AuthController@check_reset_code');
    Route::post('reset_password','AuthController@reset_password');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('me','AuthController@show');
        Route::post('activate','AuthController@activate');
        Route::post('refresh','AuthController@refresh');
        Route::get('show_profile', 'AuthController@show_profile');
        Route::post('update','AuthController@update');
        Route::get('resend_verify', 'AuthController@resend_verify');
        Route::post('update_password','AuthController@update_password');
        Route::post('logout','AuthController@logout');
    });
});


Route::group([
//    'middleware' => 'auth:api'
], function() {
    Route::group([
        'prefix' => 'notifications',
        'middleware' => 'auth:api'
    ], function() {
        Route::get('/', 'NotificationController@index');
        Route::post('send', 'NotificationController@send');
        Route::post('read', 'NotificationController@read');
        Route::post('read/all', 'NotificationController@read_all');
    });
    Route::group([
        'prefix' => 'tickets',
        'middleware' => 'auth:api'
    ], function() {
        Route::get('/','TicketController@index');
        Route::post('store','TicketController@store');
        Route::get('show','TicketController@show');
        Route::post('response','TicketController@response');
    });
    Route::group([
        'prefix' => 'sites',
//        'middleware' => 'auth:api'
    ], function() {
        Route::get('/','sitesController@index');
        Route::get('show','sitesController@show');
    });
    Route::group([
        'prefix' => 'discounts',
//        'middleware' => 'auth:api'
    ], function() {
        Route::get('/','discountsController@index');
        Route::get('show','discountsController@show');
        Route::group(['middleware' => 'auth:api'],
            function() {
                Route::get('favorites', 'discountsController@favorites');
                Route::post('toggle_favorite', 'discountsController@toggle_favorite');
            });
    });

});
Route::group([
        'prefix' => 'home',
    ], function() {
    Route::get('install','HomeController@install');
    Route::get('faqs','HomeController@faqs');
    Route::get('advertisements','HomeController@advertisements');
    Route::get('categories','HomeController@categories');
});



