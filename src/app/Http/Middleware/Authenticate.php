<?php

namespace App\Http\Middleware;

use App\Traits\LogTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    use LogTrait;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        $this->logInfo('warning', 'User has failed authentication', $request);
        throw new AuthenticationException(
            'Unauthenticated User.', $guards, $this->redirectTo($request)
        );
    }
}
