<?php

namespace App\Http\Controllers;

use App\Services\SupportEmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSupportEmail;

class SendEmailController extends Controller
{

    public function sendEmail(SupportEmailService $supportEmailService, Request $request)
    {

        try {
            $supportEmailService->process($request);
            session()->flash('success', 'Thank you for your support enquiry, we will aim to get back to you soon as we can');
            return back();
        } catch (\Exception $e){
            return back()->withErrors(['Sorry, something went wrong processing your support request, please try again']);
        }
    }

}
