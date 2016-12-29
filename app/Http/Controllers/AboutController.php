<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        //тестовый массив с данными
        $data = [
            'title' => 'Laravel Project',
            'data' => [
                '0' => 'List 1',
                '1' => 'List 2',
                '2' => 'List 3',
                '3' => 'List 4',
                '4' => 'List 5',
            ],
            'bvar' => true,
            'script' => "<script>alert('Hello World!')</script>"
        ];

        return (view()->exists('about'))
            ? view('about', $data)
            : abort(404);
    }
}
