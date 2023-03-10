<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebhookController;
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

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/docs/{route?}', [Documentation::class, 'render'])->name('documentation');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');

Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/api-dashboard', [PagesController::class, 'api_dashboard'])->name('api-dashboard');

   Route::get('/send-email',[SendEmailController::class,'index'])->name('send-email');
   Route::post('/send-email/send',[SendEmailController::class,'sendEmail'])->name('send-email-post');



    Route::get('/webhook',[WebhookController::class,'webhook'])->name('webhook');
    Route::post('/test-webhook-url',[WebhookController::class,'test_webhook_url'])->name('test-webhook-url');
    Route::get('/get-webhook-url',[WebhookController::class,'get_webhook_url'])->name('get-webhook-url');
    Route::post('/save-webhook-url',[WebhookController::class,'save_webhook_url'])->name('save-webhook-url');
});

