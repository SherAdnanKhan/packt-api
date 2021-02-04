<?php

namespace App\Http\Middleware;

use App\Traits\LogTrait;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class AccessTokenPermissions
{
    use LogTrait;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param string ...$accessPermission
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next, string ...$accessPermission)
    {
        $currentAccessToken = $request->user()->currentAccessToken();
        $referer = strtolower($request->headers->get('referer'));
        $allowedDomains = json_decode($currentAccessToken->domains);


        if(!empty($allowedDomains) && !in_array('*', $allowedDomains) && !in_array($referer, $allowedDomains)) {


            $this->logInfo('warning', 'API token does not have access of this host ' . $referer, $request);

            throw new AuthenticationException(
                'API token does not have access of this host ' . $referer
            );

        }

        /**
         * if token can SU, GOD MODE, they can do anything
         */
        if ($request->user()->tokenCan('SU')) {
            return $next($request);
        }

        /**
         * Otherwise, check for each access permission
         */
        foreach ($accessPermission as $eachPermission) {

            /**
             * If access permission is CONTENT, check if token has ALLCONTENT access
             */
            if ($eachPermission === 'CONTENT') {
                if ($request->user()->tokenCan('ALLCONTENT')) {
                    return $next($request);
                }
            }

            /**
             * else, check the rest of the conditions
             */
            if (!$request->user()->tokenCan($eachPermission)) {

                $this->logInfo('warning', 'API token does not have permission to access ' . $eachPermission, $request);

                throw new AuthenticationException(
                    'API token does not have permission to access ' . $eachPermission . '.'
                );
            }
        }
        return $next($request);
    }
}
