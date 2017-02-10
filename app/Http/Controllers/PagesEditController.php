<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request)
    {
        if ($request->isMethod('delete')){

        }
        /**
         * если в текущем маршруте есть id
         * можно внедрить в action-обработчик модель,
         * которая по этому id будет получена
         * или обычный вариант (id внедряем в качестве зависимости)
         */
        //$page = Page::find($id);

        $old = $page->toArray();

        if (view()->exists('admin.pages-edit')){
            $data = [
                'title' => 'Редактирование страницы ' . $old['title'],
                'data' => $old
            ];
            return view('admin.pages-edit', $data);
        }
    }
}
