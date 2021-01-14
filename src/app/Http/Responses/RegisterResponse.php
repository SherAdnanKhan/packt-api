<?php

namespace App\Http\Responses;

use App\Traits\LogTrait;
use Illuminate\Http\JsonResponse;

class RegisterResponse implements \Laravel\Fortify\Contracts\RegisterResponse {

    use LogTrait;

    public function toResponse($request)
    {

        $this->logInfo('info', 'A new user has just registered', $request);

        return $request->wantsJson()
            ? new JsonResponse('', 201)
            : redirect(config('fortify.home'));
    }
}
