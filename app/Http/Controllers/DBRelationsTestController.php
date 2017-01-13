<?php

namespace App\Http\Controllers;

use App\Page;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class DBRelationsTestController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        //такой вариант с конструктором запросов
//        $user = $user->pages()->where('id', '<', 25)->first();

        $page = Page::find(1);

        /**
         * many to many
         */
//        $user = User::find(1);
//        $user = User::roles()->where('roles.id', '=', 2)->first();

        $role = Role::find(1);

//        dd($role->users);

        /**
         * Пример ленивой загрузки
         * Данные о пользователе подгружаются при каждой итерации
         * как следствие - куча запросов к бд
         */
//        $pages = Page::all();
//        foreach ($pages as $page) {
//            echo $page->user->name;
//        }

        /**
         * Жадная загрузка позволяет уменьшить количество запросов к бд
         * связанные с моделью Page данные подгружаются сразу
         * в методе with указывается имя динамического свойства
         */
//        $pages = Page::with('user')->get();
//        foreach ($pages as $page) {
//            echo $page->user->name;
//        }

        /**
         * в случае когда данные уже выбраны методом all()
         * и необходимо подгрузить сразу все связанные данные из другой таблицы
         */
//        $pages = Page::all();
//        //какой-то код
//        $pages->load('user');

        /**
         * Подгрузить все связанные данные из двух таблиц
         */
//        $users = User::with(['pages', 'roles'])->get();

        /**
         * Выбираем пользователей с тремя или более страницами
         */
//        $users = User::has('pages', '>=', 3)->get();


        return (view()->exists('relations'))
            ? view('relations', ['user' => $user, 'page' => $page])
            : abort(404);
    }
}
