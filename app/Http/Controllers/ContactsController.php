<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\ISaveStr;
use App\Helpers\Facades\SaveStr;
use App\Http\Requests\ContactsRequest;
use App\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ContactsController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store(Request $request, /*ISaveStr $saveStr,*/ $id = false)
    {

        /**
         * Получаем объект реализации, указанного в первом аргументе, интерфейса
         * Для этого используем фасад App
         * То есть получаем объект вручную, без внедрения зависимости
         */
//        $saveStr = \App::make(ISaveStr::class);
//        $saveStr->save($request, \Auth::user());

        /**
         * Получаем объект через внедренную зависимость
         */
//        $saveStr->save($request, \Auth::user());
        SaveStr::save($request, \Auth::user());

        return redirect()->route('contact');
    }


    public function index(Request $request, $id = 1)
    {
//        // var_dump($id);
//        if ($request->has('name'))
//            var_dump($request->input('name'));
//
//        // только
//        var_dump($request->only(['name', 'email']));
//
//        // кроме
//        var_dump($request->except('name'));
//
//        var_dump($request->name);
//
//        // получить запрос
//        echo $request->path();
//
//        // проверить соответсвие адреса шаблону
//        if ($request->is('contact'))
//            return true;
//
//        // получить url/fullUrl
//        echo $request->url();
//        echo $request->fullUrl();
//
//        if ($request->isMethod('post'))
//            echo 'делаем что-то';
//        else
//            echo 'делаем что-то';

        // сохраняем данные формы, чтобы исключить повторный ввод пользователем
        if ($request->isMethod('post')) {
            // сохраняем в сессии все данные из формы
            // для начала в классе Kernel нужно подключить middleware сессии (добавить в свойство middleware)
            // во вью с формой отображаем старые пользовательские данные через value="{{ old('phone') }}"
            // данные сессии можно посмотреть через метод фасада Session::all()
//            $request->flash();
//
//            // если нужно добавить в сессию только некоторые данные
//            $request->flashOnly(['name', 'surname']);
//            // кроме
//            $request->flashExcept(['phone']);
//            $request->flash();
//            return redirect()->route('contact');
//            return back()->withInput();

            /**
             * Валидируем данные
             */
//            $rules = [
//                'name' => 'required|max:100|unique:users,name',
//                'email' => 'required|email'
//            ];
//            $this->validate($request, $rules);
//            //если валидация успешна то код дальше выполнится
//            dump($request);

            /**
             * Валидация массивов
             * Первый аргумент: массив данных для валидации
             * второй - правила валидации
             * $messages - свои сообщения об ошибках
             */
            $messages = [
                'name.required' => 'Поле Name Обязательно!',
                'email.max' => 'Максимально допустимое количество символов - :max',
            ];

            $validator = \Validator::make($request->all(), [
                'name' => 'required|max:100|unique:users,name',
                'email' => 'required|email'
            ], $messages);

            if ($validator->fails()) {

                //настраиваем внешний вид ошибок
//                if ($messages->has('name'))
//                    dump($messages->all('<p> :messages </p>'));

                return redirect()
                    ->route('contact')
                    ->withErrors($validator)
                    ->withInput();
            }

        }

        /**
         * Используем файл локализации для вывода данных в шаблон
         * @see resources\lang\ru\messages.php
         */
        $title = \Lang::get('messages.welcome');
        $lead = \Lang::get('messages.hello', ['name' => \Auth::user()->name]);
        /**
         * для формирования правильного окончания
         * 1 агрумент - ячейка массива
         * 2 - количество
         * @see resources\lang\ru\messages.php::apple
         */
        $apple = \Lang::choice('messages.apple', 12);
        /**
         * Сами указали правила подстановки окончаний
         * @see resources\lang\ru\messages.php::crow
         */
        if (\Lang::has('messages.crow'))
            $crow = \Lang::choice('messages.crow', 15);


        if (view()->exists('contacts'))
            return view('contacts', compact('title', 'lead', 'apple', 'crow'));
        return abort(404);
    }
}
