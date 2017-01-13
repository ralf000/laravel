<?php

namespace App\Http\Controllers;

use App\Page;
use App\Role;
use App\User;
use Carbon\Carbon;
use Faker\Factory;
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

//        ==================================================

        /**
         * добавление записи в таблицу,
         * имеющую связанные таблицы
         */
//        $user = User::find(2);
//        $faker = Factory::create();
//        $page = new Page([
//            'title' => $faker->text(50),
//            'text' => $faker->realText()
//        ]);
//        $user->pages()->save($page);

        /**
         * Другой вариант
         */
//        $user = User::find(2);
//        $faker = Factory::create();
//        $user->pages()->create([
//            'title' => $faker->text(50),
//            'text' => $faker->realText()
//        ]);
        /**
         * Ещё вариант
         */
//        $user = User::find(3);
//        $faker = Factory::create();
//        $user->pages()->saveMany([
//            new Page([
//                'title' => $faker->text(50),
//                'text' => $faker->realText()
//            ]),
//            new Page([
//                'title' => $faker->text(50),
//                'text' => $faker->realText()
//            ])
//        ]);

        /**
         * Обновление связанных данных
         */
//        $user = User::find(1);
//        $user->roles()->where('roles.id', 1)->update([
//            'name' => 'Administrator',
//        ]);

        /**
         * Привязываем пользователя 2 к странице 1
         * До этого он был привязан к странице 3
         * one to one
         * one to many
         */
//        $page = Page::find(1);
//        $user = User::find(2);
//        $page->user()->associate($user)->save();

        /**
         * Привязать пользователя ко всем выбранным записям
         * one to many
         */
//        $pages = Page::where('id', '<', 5)->get();
//        $user = User::find(1);
//        foreach ($pages as $page) {
//            $page->user()->associate($user)->save();
//        }

        /**
         * many to many
         * Привязываем пользователя 2 к роли 2
         */
//        $user = User::find(2);
//        $roleId = Role::find(2)->id;
//        $user->roles()->attach($roleId);

        /**
         * many to many
         * Удалить запись из связующей таблицы
         */
//        $user = User::find(2);
//        $roleId = Role::find(2)->id;
//        $user->roles()->detach($roleId);


        return (view()->exists('relations'))
            ? view('relations', ['user' => $user, 'page' => $page])
            : abort(404);
    }
}
