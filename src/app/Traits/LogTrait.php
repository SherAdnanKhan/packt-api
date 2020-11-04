<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

trait LogTrait {

    /**
     * @param string $type
     * @param string $message
     * @param Request $request
     * @return mixed
     */
    public function logInfo(string $type, string $message, Request $request)
    {

        return Log::{$type}($message, $this->context($request));

    }

    private function context(Request $request){
        return [
            'ip' => $request->ip(),
            'user' => auth()->user()->name ?? 'Unauthenticated',
            'user-agent' => $request->userAgent(),
            'method' => $request->getMethod()
        ];
    }

}
