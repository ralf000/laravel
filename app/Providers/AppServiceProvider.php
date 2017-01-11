<?php

namespace App\Providers;

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
