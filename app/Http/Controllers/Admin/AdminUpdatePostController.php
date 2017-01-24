<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Policies\PagePolicy;
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

        /**
         * @see App\Providers\AuthServiceProvider::boot
         * @see App\Policies\PagePolicy
         * 1 вариант для authServiceProvider + gate
         * 2 вариант для PagePolicy + gate
         * 3 вариант самый удобный
         */
//        if (\Gate::allows('update-page', $page)) {
//        if (\Gate::allows('update', $page)) {
        if ($request->user()->can('update', $page)) {

            $page->title = $data['title'];
            $page->text = $data['text'];

            $result = $user->pages()->save($page);

            return redirect()->back()->with('message', 'Материал обновлен');
        }
        return redirect()->back()->with('message', 'Нет доступа для обновления материала');
    }
}
