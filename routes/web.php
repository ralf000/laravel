<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::match(
        ['get', 'post'],
        '/',
        ['uses' => 'IndexController@execute', 'as' => 'home']);
    Route::get('/page/{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);

    Route::auth();

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // /admin
    Route::get('/', function () {
    });

    Route::group(['prefix' => 'pages'], function () {

        // /admin/pages
        Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);

        // /admin/pages/add
        Route::match(
            ['get', 'post'],
            '/add',
            ['uses' => 'PagesAddController@execute', 'as' => 'pageAdd']);
        // /admin/pages/edit/3
        Route::match(
            ['get', 'post', 'delete'],
            '/edit/{page}',
            ['uses' => 'PagesEditController@execute', 'as' => 'pageEdit']);

    });

    Route::group(['prefix' => 'portfolio'], function () {

        // /admin/portfolio
        Route::get('/', ['uses' => 'PortfolioController@execute', 'as' => 'portfolio']);

        // /admin/portfolio/add
        Route::match(
            ['get', 'post'],
            '/add',
            ['uses' => 'PortfolioAddController@execute', 'as' => 'portfolioAdd']);
        // /admin/portfolio/edit/3
        Route::match(
            ['get', 'post', 'delete'],
            '/edit/{page}',
            ['uses' => 'PortfolioEditController@execute', 'as' => 'portfolioEdit']);

    });

    Route::group(['prefix' => 'services'], function () {

        // /admin/services
        Route::get('/', ['uses' => 'ServiceController@execute', 'as' => 'services']);

        // /admin/services/add
        Route::match(
            ['get', 'post'],
            '/add',
            ['uses' => 'ServiceAddController@execute', 'as' => 'serviceAdd']);
        // /admin/services/edit/3
        Route::match(
            ['get', 'post', 'delete'],
            '/edit/{page}',
            ['uses' => 'ServiceEditController@execute', 'as' => 'serviceEdit']
        );

    });
    
});