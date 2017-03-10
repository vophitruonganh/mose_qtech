<?php

namespace App\Http\Middleware\backend;

use Session;
use Closure;
use Request;

class LoginMiddleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    public function handle($request, Closure $next)
    {
        if( !Session::has('loginBackend') ){
            $url = Request::fullUrl();
            return redirect()->guest('admin/login/?ref='.$url);
        }
        return $next($request);
    }
}
