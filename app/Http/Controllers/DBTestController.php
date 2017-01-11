<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DBTestController extends Controller
{
    public function index()
    {
//        $articles = \DB::select('SELECT * FROM articles WHERE name LIKE ?', ['%Blog post']);


//        \DB::insert('INSERT INTO articles (name, text, img) VALUES (?,?,?)', ['test1', 'texttext', 'img']);

//        \DB::update('UPDATE articles SET name = ? WHERE id = ?', ['test999', 15]);

//        \DB::delete('DELETE FROM articles WHERE id = ?', [15]);

//        dump($articles); //dd($data)

        /**
         * Получить id добавленной записи
         */
//        \DB::insert('INSERT INTO articles (name, text, img) VALUES (?,?,?)', ['test1', 'texttext', 'img']);
//        $id = \DB::connection()->getPdo()->lastInsertId();
//        dd($id); //17

//        \DB::statement('DROP table articles');


        $articles = \DB::select('SELECT * FROM articles');
        return (view()->exists('about'))
            ? view('db-test', ['articles' => $articles])
            : abort(404);
    }
}
