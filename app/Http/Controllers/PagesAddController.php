<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesAddController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {

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
