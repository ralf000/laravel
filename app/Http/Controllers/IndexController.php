<?php

namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\Filter;
use App\Helpers\Helper;
use App\Page;
use App\Portfolio;
use App\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        /**
         * разные способы выборки
         */
        $pages = Page::all();
        $portfolio = Portfolio::get(['id','name', 'image', 'filter_id']);
        $filters = Filter::all();
        $services = Service::where('id', '<', 20)->get();
        $clients = Client::all();
        $employees = Employee::take(3)->get();

        /**
         * можно выбрать только уникальные фильтры
         * фасад DB
         */
        // $result = \DB::table('filters')->distinct()->get(['title']);

        $addMenuItems = [
            ['title' => 'Services', 'alias' => 'service'],
            ['title' => 'Portfolio', 'alias' => 'portfolio'],
            ['title' => 'Clients', 'alias' => 'clients'],
            ['title' => 'Team', 'alias' => 'team'],
            ['title' => 'Contact', 'alias' => 'contact']
        ];
        $menu = Helper::getMainMenu($addMenuItems);

        return view('site.index', compact(['menu', 'pages', 'services', 'portfolio', 'filters', 'clients', 'employees']));
    }
}
