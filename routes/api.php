<?php

use App\Http\Controllers\Api\sectionsController;
use App\Http\Controllers\Api\specialtiesController;
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
    Route::post('check_reset_code','AuthController@check_reset_code');
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
        Route::post('change_password','AuthController@change_password');
        Route::post('logout','AuthController@logout');
    });
});

Route::group([
    'prefix' => 'chats',
    'middleware' => 'auth:api',
], function() {
    Route::get('rooms','ChatController@rooms');
    Route::get('rooms/messages','ChatController@messages');
    Route::get('rooms/read','ChatController@read_messages');
    Route::post('rooms/create','ChatController@create_room');
    Route::post('rooms/messages/create','ChatController@create_message');
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
        'prefix' => 'transactions',
        'middleware' => 'auth:api'
    ], function() {
        Route::get('/', 'TransactionController@index');
        Route::get('my_balance', 'TransactionController@my_balance');
        Route::post('generate_checkout', 'TransactionController@generate_checkout');
        Route::get('check_payment', 'TransactionController@check_payment');
        Route::post('request_refund', 'TransactionController@request_refund');
    });
    Route::group([
        'prefix' => 'orders',
        'middleware' => 'auth:api'
    ], function (){
        Route::get('/','OrderController@index');
        Route::get('show','OrderController@show');
        Route::post('store','OrderController@store');
        Route::post('update', 'OrderController@update');
        Route::post('review', 'OrderController@review');
    });
    Route::group([
        'prefix' => 'specialists',
        'middleware' => 'auth:api'
    ], function (){
        Route::get('/','specialtiesController@index');
        Route::get('show','specialtiesController@show');
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



