<?php

namespace App\Http\Controllers\Admin;

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
         */
        $result = $user->pages()->create([
            'title' => $data['title'],
            'text' => $data['text']
        ]);

        return redirect()->back()->with('message', 'Материал добавлен');
    }

}
