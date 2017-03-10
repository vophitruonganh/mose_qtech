<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Request;

class DomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->fullUrl() == 'http://store.moseplus.com/admin/setting/domains'){
            switch (Session::get('user_level')) {
                case '1':
                    return $next($request);
                    break;
                case '2':
                    return redirect('./admin');
                    break;
                case '3':
                    return redirect('./admin');
                    break;
                default:
                    break;
            }
        }

    }
}
