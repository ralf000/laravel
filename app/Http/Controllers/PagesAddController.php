<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class PagesAddController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            $validator = \Validator::make($input, [
                'title' => 'required|max:255',
                'alias' => 'required|unique:pages|max:100',
                'text' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('pageAdd')
                    ->withErrors($validator)
                    ->withInput();
            }

            /**
             * @var $file UploadedFile
             */
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $input['image'] = $file->getClientOriginalName();
                $file->storeAs('img', $input['image']);
            }

            $page = new Page();
            /**
             * разрешить заполнение полей модели можно:
             * в самой модели указать свойство $fillable
             */
            $page->fill($input);

            if ($page->save())
                return redirect('admin')->with('status', 'Страница добавлена');

        }

        $data = [
            'title' => 'Новая страница'
        ];
        if (view()->exists('admin.pages-add')) {
            return view('admin.pages-add', $data);
        }
        return abort(404);
    }
}
