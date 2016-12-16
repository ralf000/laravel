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

Route::get('/', function () {
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