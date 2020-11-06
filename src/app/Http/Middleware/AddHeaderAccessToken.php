<?php

namespace App\Http\Middleware;

use Closure;

class AddHeaderAccessToken {

    public function handle($request, Closure $next)
    {

        if($request->has('token')){
            $request->headers->set('Authorization', 'Bearer ' . $request->get('token'));
        }

        return $next($request);
    }

}
