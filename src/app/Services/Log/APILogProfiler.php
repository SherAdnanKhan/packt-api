<?php

namespace App\Services\Log;

use Illuminate\Http\Request;
use Spatie\HttpLogger\LogProfile;

class APILogProfiler implements LogProfile
{
    public function shouldLogRequest(Request $request): bool
    {
        return in_array(strtolower($request->method()), ['get','post', 'put', 'patch', 'delete']);
    }
}
