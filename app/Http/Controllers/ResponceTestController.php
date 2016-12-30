<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ResponceTestController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Hello World'];
        /**
         * @var $view View
         */
        $view = view('responce-test', $data);

//        return (new Response($view))->header('Content-Type', 'application/json');
//        или так
//        return response($view)->header('Content-Type', 'application/json');
//        возвращаем json
//        return response()->json(['name' => 'Bob', 'soname' => 'Marley']);
//        отдаём файл на скачивание (можно относительно каталога public или текущего расположения через __DIR__)
        return response()->download('robots.txt', 'otherfilename');
    }
}
