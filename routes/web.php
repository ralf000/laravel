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

//Route::get('/about', 'AboutController@index');

Route::get('/about', 'DBTestController@index')->middleware('auth');

Route::get('/articles', 'DBTestController@articles');

Route::get('/pages', 'DBTestController@pages');

Route::get('/relations-test', 'DBRelationsTestController@index');

Route::get('/contacts', ['uses'=>'ContactsController@index', 'as' => 'contact']);
Route::post('/contacts', ['uses'=>'ContactsController@index']);

Route::get('/responce-test', 'ResponceTestController@index');

//Регистрирует основные маршруты для аунтефикации пользователей
//подробнее artisan route:list
Auth::routes();

Route::get('/home', 'HomeController@index');

/**
 * создаём свою группу закрытых маршрутов
 */
$attributes = [
    'prefix' => 'admin',
    'middleware' => ['web','auth']
];
Route::group($attributes, function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin_index');
    Route::get('/add/post', 'Admin\AdminPostController@create')->name('admin_add_post');
});
