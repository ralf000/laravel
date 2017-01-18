<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUpdatePostController extends Controller
{
    public function index(Request $request, $id)
    {
        $page = Page::find($id);
        return view('admin.update_post', [
            'title' => 'Редактирование материала',
            'page' => $page
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $user = \Auth::user();
        //except - кроме
        $data = $request->except('_token');
        $page = Page::find($data['id']);

        $page->title = $data['title'];
        $page->text = $data['text'];

        $result = $user->pages()->save($page);

        return redirect()->back()->with('message', 'Материал обновлен');
    }
}
