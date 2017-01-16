<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->all();

        /**
         * @var bool $result
         */
        $remember = $request->has('remember');
        $result = \Auth::attempt([
            'login' => $data['login'],
            'password' => $data['password']
        ], $remember);
        //redirect to the previous url
        //'/admin' if the previous url can not be found
        if ($result){
            return redirect()->intended('/admin');
        }
        //if false return a user to the login page
        return redirect()
            ->back()
            ->withInput($request->only('login', 'remember'))
            ->withErrors([
                'login' => 'Данные аутефикации не верны'
            ]);
    }
}
