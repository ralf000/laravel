<?php

namespace App\Providers;

use App\Page;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * добавляем обработчик на событие использования подключения к бд
         * тем самым можно, например, смотреть sql запросы
         * либо посмотреть параметры sql запроса
         */
//        \DB::listen(function ($query){
//            dump($query->sql);
//            dump($query->bindings);
//        });

        /**
         * Используем предустановленное событие
         * При каждом содании новой страницы (Page)
         * в логи записывается информация об этом
         */
        Page::created(function (Page $page) {
            \Log::info('Page saved in database', [$page->user->name => $page->title]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
