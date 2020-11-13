<?php

namespace App\Http\Controllers;

use App\Services\Api\TestAPIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class TestAPIController extends Controller
{

    public function index(Request $request, TestAPIService $testAPIService)
    {

        try {
            $response = $testAPIService
                ->setUser(Auth::user())
                ->setRequest($request)
                ->process();

            return response()->json($response);
        } catch(Exception $e){
            return abort(404);
        }

    }

}
