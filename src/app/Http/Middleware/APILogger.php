<?php

namespace App\Http\Middleware;

use App\Services\Log\APILogWriter;
use Closure;
use Illuminate\Http\Request;
use Spatie\HttpLogger\LogProfile;
use Spatie\HttpLogger\LogWriter;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class APILogger
{
    protected LogProfile $logProfile;

    protected LogWriter $logWriter;

    /**
     * APILogger constructor.
     *
     * @param LogProfile $logProfile
     * @param LogWriter $logWriter
     */
    public function __construct(LogProfile $logProfile, APILogWriter $logWriter)
    {
        $this->logProfile = $logProfile;
        $this->logWriter = $logWriter;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param \Illuminate\Http\Request $request
     * @param SymfonyResponse $response
     * @return void
     */
    public function terminate(Request $request, SymfonyResponse $response)
    {
        if ($this->logProfile->shouldLogRequest($request)) {
            $this->logWriter->logRequestAndResponse($request, $response);
        }
    }
}
