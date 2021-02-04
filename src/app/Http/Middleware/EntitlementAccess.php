<?php

namespace App\Http\Middleware;

use App\Models\CompanyProduct;
use App\Models\UserPermission;
use Closure;
use Illuminate\Http\Request;
use App\Models\CompanyUser;
use App\Models\UserProduct;

class EntitlementAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->tokenCan('ALLCONTENT') || $request->user()->tokenCan('SU')) {

            $allContent = $request->user()->tokenCan('ALLCONTENT');
            $su = $request->user()->tokenCan('SU');

            $userPermissions = UserPermission::where('user_id', auth()->user()->id)->first();

            if($userPermissions && is_array($userPermissions->abilities)) {
                if(!($su && in_array('SU', $userPermissions->abilities)) && !($allContent && in_array('ALLCONTENT', $userPermissions->abilities))) {
                    return response()->json([
                        'errorMessage' => 'You dont have access to download the files of this Product.'
                    ], 403);
                }
            } else {
                return response()->json([
                    'errorMessage' => 'You dont have access to download the files of this Product.'
                ], 403);
            }

        } else {

            $companyProduct = null;

            $userProduct = UserProduct::where('user_id', auth()->user()->id)
                ->where('product_id', $request->sku)->first();

            $companiesUser = CompanyUser::where('user_id', auth()->user()->id)->first();

            if($companiesUser) {
                $companyProduct = CompanyProduct::where('company_id', $companiesUser->company_id)->where('product_id', $request->sku)->first();
            }

            if(!$userProduct && !$companyProduct) {
                return response()->json([
                    'errorMessage' => 'You dont have access to download the files of this Product.'
                ], 403);
            }

        }

        return $next($request);
    }
}
