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

Route::get('/', function (){
    return view('welcome');
});

/**
 * Определяем имя роута для использования в дальнейшем
 * имя можно использовать далее в других роутах
 * также определяем параметр id
 * Выведет на странице "http://laravel/page/id?10"
 */
/*
Route::get('/page/{id}', function ($id) {
    echo route('pagename', ['id', $id]) . '<br>';
})->name('pagename');
*/

/**
 * добавляем редирект по заранее определенному имени роута
 * также определяем параметр id для передачи роуту
 */
/*
Route::get('/otherpage', function () {
    return redirect()->route('pagename', ['id' => 25]);
});
*/

/**
 * Пример передачи параметров
 * /page/hello/10
 */
/*
Route::get('/page/{cat}/{id}', function ($cat, $id) {
    echo $cat, $id;
})->where([
    'id' => '[0-9]+',
    'cat' => '[a-zA-Z]+'
]);
*/

/**
 * Пример группировки маршрутов
 * Теперь машруты ниже доступны по адресу /admin/page/create
 */
/*
Route::group(['prefix' => 'admin'], function () {
    Route::get('/page/create', function () {
        echo 'page/create';
    });

    Route::get('/page/edit', function () {
        echo 'page/edit';
    });
});
*/


//=============== Используем контроллеры ============
/**
 * выполняем метод контроллера
 * пространство имен по умолчанию определено в
 * RouteServiceProvider::$namespace
 */
//Route::get('/about', 'TestController@show');
/**
 * передаем параметр в метод
 */
//Route::get('/about/{id}', 'TestController@show')->name('test');


//==========Работаем с CRUD==========================
//Route::resource('/pages', 'TestResourceController');

/**
 * разрешаем маршруты
 */
//Route::resource('/pages', 'TestResourceController',
//    ['only' => 'index', 'show']
//);
/**
 * исключаем маршруты
 */
//Route::resource('/pages', 'TestResourceController',
//    ['except' => 'index', 'show']
//);

/**
 * добаляем собственный метод в контроллер
 */
//Route::get('/pages/anyMethod', 'TestResourceController');

//===========ИЗУЧАЕМ MIDDLEWARES (КЛАССЫ ПОСРЕДНИКИ)==========
/**
 * создали свой класс посредник MyMiddleWare, реагирующий на параметр запроса page
 */
//Route::get('/article/{page}', 'TestController@show')->middleware('mymiddleware');

/**
 * add auth for admin/index page
 */
//Route::get('/admin/index', 'Admin\IndexController@index')->middleware('auth');

/**
 * своя view
 */
Route::get('/bootstrap', 'IndexController@index');

Route::get('/about', 'AboutController@index');

Route::match(['get', 'post'], '/contacts/{id?}', ['uses'=>'ContactsController@index', 'as' => 'contact']);

Route::get('/responce-test', 'ResponceTestController@index');