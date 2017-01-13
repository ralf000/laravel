<?php

namespace App\Http\Controllers;

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
            $rules = [
                'name' => 'required|max:100|unique:users,name',
                'email' => 'required|email'
            ];
            $this->validate($request, $rules);
            //если валидация успешна то код дальше выполнится
            dump($request);

        }

        if (view()->exists('contacts'))
            return view('contacts');
        return abort(404);
    }
}
