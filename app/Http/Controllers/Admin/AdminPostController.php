<?php

namespace App\Http\Controllers\Admin;

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
        if (\Gate::denies('add-page'))
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
