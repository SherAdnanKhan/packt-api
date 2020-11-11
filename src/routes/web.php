<?php

use App\Http\Controllers\ProductController;
use App\Http\Livewire\Docs;
use App\Http\Livewire\Documentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/docs/{route?}', [Documentation::class, 'render'])->name('documentation');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/doc-overview', function(){
        return view('docs');
    });

   Route::get('/send-email',[SendEmailController::class,'index'])->name('send-email');
   Route::post('/send-email/send',[SendEmailController::class,'send'])->name('send-email');
});

