<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        /**
         * передача данных во view
         */
        $data = [
            'a' => 'Hello world!',
            'b' => 2
        ];
        return view('index', $data);

        /**
         * проверяем view на существование
         * и отображаем
         */
//        if (view()->exists('mytemplates.bootstrap_example'))
//            return view('mytemplates.bootstrap_example', $data);

        /**
         * сохраняем view в переменной
         */
//        $view = view('mytemplates.bootstrap_example', $data)->render();
//        echo $view;
//        return;

        /**
         * Даем имя view
         */
//        view()->name('mytemplates.bootstrap_example', 'bootstrap');
//        return view()->of('bootstrap', $data);

        /**
         * вызываем view по определенному пути
         * config('view.paths') - обращаемся к свойству конфига view.php
         */
//        $path = config('view.paths');
//        return view()->file($path[0] . '/mytemplates.layout.blade.php', $data);


    }
}
