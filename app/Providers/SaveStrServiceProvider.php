<?php

namespace App\Providers;

use App\Helpers\Contracts\ISaveStr;
use App\Helpers\SaveEloquentORM;
use App\Helpers\SaveFile;
use Illuminate\Support\ServiceProvider;

class SaveStrServiceProvider extends ServiceProvider
{
    /**
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
        $this->app->bind(ISaveStr::class, function (){
//            return new SaveFile();
            return new SaveEloquentORM();
        });
    }
}
