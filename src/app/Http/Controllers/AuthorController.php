<?php

namespace App\Http\Controllers;

use App\Services\Api\AuthorHttpService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{


    public function index(AuthorHttpService $authorHttpService)
    {



            $response = $authorHttpService->getAuthorList();

    }

}
