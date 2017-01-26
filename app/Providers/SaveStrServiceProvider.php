<?php

namespace App\Providers;

use App\Helpers\Contracts\ISaveStr;
use App\Helpers\SaveEloquentORM;
use App\Helpers\SaveFile;
use Illuminate\Support\ServiceProvider;

class SaveStrServiceProvider extends ServiceProvider
{
    /**
     * Исполнится после регистрации (загрузки) всех сервисПровайдеров
     * Сюда можно внедрять любую логику и добавлять зависимости типа Request $request
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Привязываем свой класс к сервиспровайдеру
     * Register the application services.
     * @return void
     */
    public function register()
    {
        /**
         * если мы хотим привязать конретную реализацию то можно написать так
         * $this->app->bind(ISaveStr::class, SaveEloquentORM::class);
         */
        $this->app->bind('savestr', function (){
        //если создаваемый объект должен быть в одном экземпляре во всей системе
        //$this->app->singleton(ISaveStr::class, function (){
            return new SaveEloquentORM();
            //или другой объект, реализующий интерфейс ISaveStr
            //return new SaveFile();
        });
    }
}
