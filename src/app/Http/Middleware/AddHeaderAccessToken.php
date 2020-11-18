<?php

namespace App\Http\Middleware;

use Closure;

class AddHeaderAccessToken {

    public function handle($request, Closure $next)
    {

        if ($request->route() !== null && in_array('api', $request->route()->middleware())) {
            $request->headers->set('Accept', 'application/json');
        }

        if($request->has('token')){
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer ' . $request->get('token'));
        }

        return $next($request);
    }

}
