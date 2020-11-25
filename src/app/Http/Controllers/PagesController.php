<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){

        if(auth()->check()){
            return redirect()->route('dashboard');
        }

        return view('welcome');
    }

    public function dashboard(){
        return view('dashboard');
    }

}
