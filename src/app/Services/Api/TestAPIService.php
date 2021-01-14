<?php

namespace App\Services\Api;

use App\Services\BaseService;
use Illuminate\Http\Request;
use PHPUnit\Exception;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class TestAPIService extends BaseService
{


    public function process()
    {

        try {
            $IsSandboxToken = $this->user->currentAccessToken()->sandbox;
            $tokenAbilities = $this->user->currentAccessToken()->abilities;

            return [
                'system' => 'OK',
                'token' => 'OK',
                'token_access' => $tokenAbilities,
                'token_last_used' => $this->user->currentAccessToken()->last_used_at->diffForHumans(),
                'sandbox_token' => $IsSandboxToken
            ];
        } catch(Exception $e){
            abort(500, 'Sorry, Something went wrong');
        }


    }

}
