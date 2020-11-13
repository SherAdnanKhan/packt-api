<?php

namespace App\Http\Controllers;

use App\Services\SupportEmailService;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{

    public function sendEmail(SupportEmailService $supportEmailService, Request $request)
    {

        try {
            $supportEmailService->setRequest($request)->process();
            session()->flash('success', 'Thank you for your support enquiry, we will aim to get back to you soon as we can');
            return back();
        } catch (\Exception $e){
            return back()->withErrors(['Sorry, something went wrong processing your support request, please try again']);
        }
    }

}
