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
use Illuminate\Mail\Message;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {

            $messages = [
                'required' => 'Поле :attribute обязательно к заполнению!',
                'email' => 'Поле :attribute должно соответствовать email адресу'
            ];

            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ], $messages);

            $data = $request->all();

            // use ($data) для примера, как передать данные в closure
            \Mail::send('mails.question', ['data' => $data], function ($message) use ($data) {
                /**
                 * @var Message $message
                 */
                $mailAdmin = env('MAIL_ADMIN');
                $message->from($data['email'], $data['name']);
                $message->to($mailAdmin)->subject('Question');
            });
            
            return redirect()->route('home')->with('status', 'Email is send');

        }

        /**
         * разные способы выборки
         */
        $pages = Page::all();
        $portfolio = Portfolio::get(['id', 'name', 'image', 'filter_id']);
        $filters = Filter::all();
        $services = Service::where('id', '<', 20)->get();
        $clients = Client::all();
        $employees = Employee::take(3)->get();

        // пример использования фасада DB
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
