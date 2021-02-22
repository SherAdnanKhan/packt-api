<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function render($request, \Throwable $throwable)
    {
        if ($throwable instanceof ValidationException) {
            return response()->json(['errorMessage' => 'The given data was invalid.'], 404);
        }

        if ($throwable instanceof ModelNotFoundException) {
            return response()->json(['errorMessage' => 'Resource not found.'], 404);
        }

        if($throwable instanceof ThrottleRequestsException){
            return response()->json(['errorMessage' => 'Rate Limit Exceeded.'], 429);
        }

        if($request->is('api/*')){
            if ($throwable instanceof NotFoundHttpException) {
                return route('fallback');
            }
        }

        return parent::render($request, $throwable);

    }

    protected function unauthenticated($request, AuthenticationException $exception)

    {
        return $request->expectsJson()
            ? response()->json(['errorMessage' => $exception->getMessage()], 401)
            : redirect()->guest($exception->redirectTo() ?? route('login'));
    }
}
