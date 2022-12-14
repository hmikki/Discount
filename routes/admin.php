<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Admin" middleware group. Enjoy building your Admin!
|
*/
Route::get('app/lang', 'HomeController@lang');


/*
|--------------------------------------------------------------------------
| Admin Auth
|--------------------------------------------------------------------------
| Here is where admin auth routes exists for login and log out
*/
Route::group([
    'namespace'  => 'Auth',
], function() {
    Route::get('login', ['uses' => 'LoginController@showLoginForm','as'=>'admin.login']);
    Route::post('login', ['uses' => 'LoginController@login']);
    Route::group([
        'middleware' => 'auth.admin',
    ], function() {
        Route::post('logout', ['uses' => 'LoginController@logout','as'=>'admin.logout']);
    });
});
/*
|--------------------------------------------------------------------------
| Admin After login in
|--------------------------------------------------------------------------
| Here is where admin panel routes exists after login in
*/
Route::group([
    'middleware'  => 'auth.admin',
], function() {
    Route::get('/', 'HomeController@index');
    Route::get('delete/media', 'HomeController@delete_media');
    Route::post('notification/send', 'HomeController@general_notification');
    Route::post('notification/send/custom', 'HomeController@custom_notification');

    /*
    |--------------------------------------------------------------------------
    | Admin > App Management
    |--------------------------------------------------------------------------
    | Here is where App Management routes
    */

    Route::group([
        'prefix'=>'app_managements',
        'namespace'=>'AppManagement',
    ],function () {
        Route::group([
            'prefix'=>'employees'
        ],function () {
            Route::get('/','AdminController@index');
            Route::get('/create','AdminController@create');
            Route::post('/','AdminController@store');
            Route::get('/{admin}','AdminController@show');
            Route::get('/{admin}/edit','AdminController@edit');
            Route::put('/{admin}','AdminController@update');
            Route::delete('/{admin}','AdminController@destroy');
            Route::patch('/update/password',  'AdminController@updatePassword');
            Route::get('/option/export','AdminController@export');
            Route::get('/{id}/activation','AdminController@activation');
        });
        Route::group([
            'prefix'=>'roles'
        ],function () {
            Route::get('/','RoleController@index');
            Route::get('/create','RoleController@create');
            Route::post('/','RoleController@store');
            Route::get('/{role}','RoleController@show');
            Route::get('/{role}/edit','RoleController@edit');
            Route::put('/{role}','RoleController@update');
            Route::delete('/{role}','RoleController@destroy');
            Route::get('/option/export','RoleController@export');
        });
        Route::group([
            'prefix'=>'permissions'
        ],function () {
            Route::get('/','PermissionController@index');
            Route::get('/create','PermissionController@create');
            Route::post('/','PermissionController@store');
            Route::get('/{permission}','PermissionController@show');
            Route::get('/{permission}/edit','PermissionController@edit');
            Route::put('/{permission}','PermissionController@update');
            Route::delete('/{permission}','PermissionController@destroy');
            Route::get('/option/export','PermissionController@export');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Admin > App Data
    |--------------------------------------------------------------------------
    | Here is where App Data routes
    */
    Route::group([
        'prefix'=>'app_data',
        'namespace'=>'AppData',
    ],function () {
        Route::group([
            'prefix'=>'settings'
        ],function () {
            Route::get('/','SettingController@index');
            Route::get('/{setting}/edit','SettingController@edit');
            Route::put('/{setting}','SettingController@update');
        });

        Route::group([
            'prefix'=>'faqs'
        ],function () {
            Route::get('/','FaqController@index');
            Route::get('/create','FaqController@create');
            Route::post('/','FaqController@store');
            Route::get('/{faq}','FaqController@show');
            Route::get('/{faq}/edit','FaqController@edit');
            Route::put('/{faq}','FaqController@update');
            Route::delete('/{faq}','FaqController@destroy');
            Route::get('/option/export','FaqController@export');
            Route::get('/{id}/activation','FaqController@activation');
        });
        Route::group([
            'prefix'=>'countries'
        ],function () {
            Route::get('/','CountryController@index');
            Route::get('/create','CountryController@create');
            Route::post('/','CountryController@store');
            Route::get('/{country}','CountryController@show');
            Route::get('/{country}/edit','CountryController@edit');
            Route::put('/{country}','CountryController@update');
            Route::delete('/{country}','CountryController@destroy');
            Route::get('/option/export','CountryController@export');
        });
        Route::group([
            'prefix'=>'cities'
        ],function () {
            Route::get('/','CityController@index');
            Route::get('/create','CityController@create');
            Route::post('/','CityController@store');
            Route::get('/{city}','CityController@show');
            Route::get('/{city}/edit','CityController@edit');
            Route::put('/{city}','CityController@update');
            Route::delete('/{city}','CityController@destroy');
            Route::get('/option/export','CityController@export');
        });
        Route::group([
            'prefix'=>'splash_screens'
        ],function () {
            Route::get('/','SplashScreenController@index');
            Route::get('/create','SplashScreenController@create');
            Route::post('/','SplashScreenController@store');
            Route::get('/{splash_screen}','SplashScreenController@show');
            Route::get('/{splash_screen}/edit','SplashScreenController@edit');
            Route::put('/{splash_screen}','SplashScreenController@update');
            Route::delete('/{splash_screen}','SplashScreenController@destroy');
            Route::get('/option/export','SplashScreenController@export');
        });
    });
    /*
    |--------------------------------------------------------------------------
    | Admin > App
    |--------------------------------------------------------------------------
    | Here is where App Content routes
    */
    Route::group([
        'prefix'=>'app_content',
        'namespace'=>'AppContent',
    ],function () {
        Route::group([
            'prefix'=>'advertisements'
        ],function () {
            Route::get('/','AdvertisementController@index');
            Route::get('/create','AdvertisementController@create');
            Route::post('/','AdvertisementController@store');
            Route::get('/{advertisement}','AdvertisementController@show');
            Route::get('/{advertisement}/edit','AdvertisementController@edit');
            Route::put('/{advertisement}','AdvertisementController@update');
            Route::delete('/{advertisement}','AdvertisementController@destroy');
            Route::get('/option/export','AdvertisementController@export');
        });
        Route::group([
            'prefix'=>'categories'
        ],function () {
            Route::get('/','CategoryController@index');
            Route::get('/create','CategoryController@create');
            Route::post('/','CategoryController@store');
            Route::get('/{section}','CategoryController@show');
            Route::get('/{section}/edit','CategoryController@edit');
            Route::put('/{section}','CategoryController@update');
            Route::delete('/{section}','CategoryController@destroy');
            Route::get('/option/export','CategoryController@export');
        });
        Route::group([
            'prefix'=>'sites'
        ],function () {
            Route::get('/','SitesController@index');
            Route::get('/create','SitesController@create');
            Route::post('/','SitesController@store');
            Route::post('/status','SitesController@change_status');
            Route::get('/{order}','SitesController@show');
            Route::get('/{order}/edit','SitesController@edit');
            Route::put('/{order}','SitesController@update');
            Route::delete('/{order}','SitesController@destroy');
            Route::get('/option/export','SitesController@export');
        });
        Route::group([
            'prefix'=>'discounts'
        ],function () {
            Route::get('/','DiscountController@index');
            Route::get('/create','DiscountController@create');
            Route::post('/','DiscountController@store');
            Route::post('/status','DiscountController@change_status');
            Route::get('/{order}','DiscountController@show');
            Route::get('/{order}/edit','DiscountController@edit');
            Route::put('/{order}','DiscountController@update');
            Route::delete('/{order}','DiscountController@destroy');
            Route::get('/option/export','DiscountController@export');
        });
    });
    /*
    |--------------------------------------------------------------------------
    | Admin > App Users
    |--------------------------------------------------------------------------
    | Here is where App Users routes
    */

    Route::group([
        'prefix'=>'user_managements',
        'namespace'=>'UserManagement',
    ],function () {
        Route::group([
            'prefix'=>'users'
        ],function () {
            Route::get('/','UserController@index');
            Route::get('/create','UserController@create');
            Route::post('/','UserController@store');
            Route::get('/{user}','UserController@show');
            Route::get('/{user}/edit','UserController@edit');
            Route::put('/{user}','UserController@update');
            Route::patch('/update/password',  'UserController@updatePassword');
            Route::get('/option/export','UserController@export');
            Route::get('/{id}/activation','UserController@activation');
            Route::get('/{user}/active_mobile_email','UserController@active_mobile_email');
        });

        Route::group([
            'prefix'=>'tickets'
        ],function () {
            Route::get('/','TicketController@index');
            Route::get('/create','TicketController@create');
            Route::post('/','TicketController@store');
            Route::get('/{ticket}','TicketController@show');
            Route::post('/{ticket}/response','TicketController@response');
            Route::get('/{ticket}/close','TicketController@close');
        });
    });
});
