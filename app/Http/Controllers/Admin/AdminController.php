<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * Закрываем контроллен для неавторизованных пользователей
     * AdminController constructor.
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        //current auth user
//        dump(\Auth::user());

        //if user auth
//        if (\Auth::check())
//            return redirect('/login');

        //user id
//        dd(\Auth::id());

        return view('home', ['pages' => Page::limit(5)->get()]);
    }
}
