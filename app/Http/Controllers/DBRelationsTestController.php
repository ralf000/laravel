<?php

namespace App\Http\Controllers;

use App\Page;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class DBRelationsTestController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        //такой вариант с конструктором запросов
//        $user = $user->pages()->where('id', '<', 25)->first();

        $page = Page::find(1);

        /**
         * many to many
         */
//        $user = User::find(1);
//        $user = User::roles()->where('roles.id', '=', 2)->first();

        $role = Role::find(1);

//        dd($role->users);


        return (view()->exists('relations'))
            ? view('relations', ['user' => $user, 'page' => $page])
            : abort(404);
    }
}
