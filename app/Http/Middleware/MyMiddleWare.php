<?php

namespace App\Http\Middleware;

use Closure;

class MyMiddleWare
{

//    public function __construct()
//    {
        //можно добавить посредник здесь, а не в route
//        $this->middleware('mymiddleware');
//    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->route('page') !== 'page')
            return redirect('/');
        return $next($request);
    }
}
