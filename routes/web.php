<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin' , 'middleware' => ['auth:web' , 'checkAdmin'], 'prefix' => 'admin'],function (){

    Route::resource('panel'             , 'PanelController');
    Route::resource('users'             , 'UserController');
    Route::resource('permissions'       , 'PermissionController');
    Route::resource('roles'             , 'RoleController');
    Route::resource('levelAdmins'       , 'LevelManageController');
    Route::resource('profile'           , 'ProfileController');
    Route::resource('menudashboards'    , 'MenudashboardController');
    Route::resource('submenudashboards' , 'SubmenudashboardController');
    Route::resource('medias'            , 'MediaController');
    Route::resource('menus'             , 'MenuController');
    Route::resource('services'          , 'ServiceController');
    Route::resource('subservices'       , 'SubserviceController');
    Route::resource('reservations'       , 'ReservationController');
    Route::delete('reservation/delete/{id}'     , 'ReservationController@deletreserve')->name('delete-reserve');

    Route::post('services/{id}/img'           , 'MediaController@imgupload');
    Route::post('subservices/{id}/img'        , 'MediaController@imgupload');

    Route::post('products/typeoption'        , 'ServiceController@typeoption')->name('typeoption');
    Route::post('products/modeloption'         , 'ServiceController@modeloption')->name('modeloption');
    Route::patch('products/updateproimg/{id}'    , 'ServiceController@updateproimg')->name('updateproimg');

    Route::resource('profiles'              , 'ProfileController');

});

Route::group(['namespace' => 'Site'] , function (){
    Route::get('/'                          , 'IndexController@index');
    Route::get('services'                   , 'IndexController@service');
    Route::get('services/{slug}'            , 'IndexController@singleservice');
    Route::get('aboutus'                    , 'IndexController@aboutus');
    Route::get('reservation'                , 'ReservationController@index');
    Route::get('package-service/{id}'       , 'ReservationController@packagereserve');
    Route::get('packageservice'             , 'IndexController@packageservice');
    Route::post('reservation'               , 'ReservationController@reservset')->name('reservation-set');
    Route::post('packageset'                , 'ReservationController@packageset')->name('package-set');
    Route::post('reservation/serviceoption' , 'ReservationController@serviceoption')->name('serviceoption');
    Route::delete('reservation/delete/{id}' , 'ReservationController@deletreserve')->name('deletereserve');
    Route::get('customers'                  , 'IndexController@customer');
    Route::post('counter'                   , 'IndexController@counter')->name('counter');
});

Route::group(['namespace' => 'Auth' , 'prefix' => 'admin'] , function (){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

});
Route::group(['namespace' => 'Auth'] , function (){
    // Authentication Routes...
    Route::get('login'      , 'LoginController@showLoginuserForm')->name('loginuser');
    Route::post('login-user', 'LoginController@loginuser')->name('login-user');
    Route::get('logout'     , 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register'   , 'RegisterController@showRegistrationuserForm');
    Route::post('register'  , 'RegisterController@registeruser')->name('register');

    Route::get('token'      , 'TokenController@showToken')->name('phone.token');
    Route::post('token'     , 'TokenController@token')->name('verify.phone.token');

    Route::get('welcome'    , 'WelcomeController@index' )->name('welcome');

});
