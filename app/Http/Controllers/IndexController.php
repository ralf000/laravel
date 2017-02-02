<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Helpers\Helper;
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

        $addMenuItems = [
            ['title' => 'Services', 'alias' => 'service'],
            ['title' => 'Portfolio', 'alias' => 'portfolio'],
            ['title' => 'Clients', 'alias' => 'clients'],
            ['title' => 'Team', 'alias' => 'team'],
            ['title' => 'Contact', 'alias' => 'contact']
        ];
        $menu = Helper::getMainMenu($addMenuItems);

        return view('site.index', compact(['menu', 'pages', 'services', 'portfolio']));
    }
}
