<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Page;
use App\Portfolio;
use App\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $pages = Page::all();
        $portfolio = Portfolio::get(['name', 'image']);
        $services = Service::where('id', '<', 20)->get();
        $employee = Employee::take(3)->get();


        return view('site.index');
    }
}
