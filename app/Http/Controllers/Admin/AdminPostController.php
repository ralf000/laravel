<?php

namespace App\Http\Controllers\Admin;

use App\Events\OnAddPageEvent;
use App\Listeners\AddPageListener;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.add_post', ['title' => 'Новый материал']);
    }

    public function create(Request $request)
    {

        $page = new Page();

        /**
         * @see App\Providers\AuthServiceProvider::boot
         * @see App\Policies\PagePolicy
         * 1 вариант для authServiceProvider + gate
         * 2 вариант для PagePolicy + gate
         */
//        if (\Gate::denies('add-page', $page))
//        if (\Gate::denies('add', $page))
//            return redirect()->back()->with('message', 'Добавление страницы запрещено');

        //3 вариант
        if ($request->user()->cannot('add', $page))
            return redirect()->back()->with('message', 'Добавление страницы запрещено');

        $this->validate($request, [
            'title' => 'required'
        ]);

        $user = \Auth::user();
        $data = $request->all();

        /**
         * Используя связанную с пользователем таблицу pages
         * сохраняем в неё поступившие данные
         * @var $result Page
         */
        $result = $user->pages()->create([
            'title' => $data['title'],
            'text' => $data['text']
        ]);

        /**
         * Указываем, что происходит событие
         * (выбрасываем событие)
         * @see App\Events\OnAddPageEvent
         * @see App\Listeners\AddPageListener
         */
        //1 вариант
        \Event::fire(new OnAddPageEvent($result, $user));
        //2 вариант
//        event(new OnAddPageEvent($result, $user));

        return redirect()->back()->with('message', 'Материал добавлен');
    }

}
