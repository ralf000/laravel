<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            /**
             * для alias исключаем из поиска текущую запись
             */
            $validator = \Validator::make($input, [
                'title' => 'required|max:255',
                'alias' => 'required|max:255|unique:pages,alias,' . $input['id'],
                'text' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('pageEdit', ['page' => $input['id']])
                    ->withErrors($validator);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalName = $file->getClientOriginalName();
                $file->storeAs('img', $originalName);
                $input['image'] = $originalName;
            } else {
                $input['image'] = $input['old_image'];
            }

            unset($input['old_image']);

            $page->fill($input);

            if ($page->update()){
                return redirect('admin')->with('status', 'Страница обновлена');
            }
        }
        /**
         * если в текущем маршруте есть id
         * можно внедрить в action-обработчик модель,
         * которая по этому id будет получена
         * или обычный вариант (id внедряем в качестве зависимости)
         */
        //$page = Page::find($id);

        $old = $page->toArray();

        if (view()->exists('admin.pages-edit')) {
            $data = [
                'title' => 'Редактирование страницы ' . $old['title'],
                'data' => $old
            ];
            return view('admin.pages-edit', $data);
        }
    }
}
