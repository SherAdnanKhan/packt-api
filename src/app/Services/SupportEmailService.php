<?php

namespace App\Services;

use App\Mail\SendSupportEmail;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Mail;

class SupportEmailService {

    use ValidatesRequests;

    public function process($request){


        $supportEmail = ($request->contact_reason == 'access') ? config('app.access_email') : config('app.support_email');

        $this->validate($request, [
            'contact_reason' => 'required',
            'message' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'emailcopy' => 'boolean'
        ]);

        if ($request->has('image')) {
            $file = $request->image->store('supportdocuments');
        }

        $data = array(
            'contact_reason' => $request->contact_reason,
            'message' => $request->message,
            'image' => $file ?? null,
            'emailcopy' => $request->emailcopy,
            'user' => $request->user()
        );

        if ($request->get('emailcopy') == 1) {
            $mail = Mail::to($supportEmail)->send(new SendSupportEmail($data));
            $customerEmail = Mail::to($request->user()->email)->send(new SendSupportEmail($data));

            if($mail && $customerEmail){
                return true;
            }
        } else {
            $mail = Mail::to($supportEmail)->send(new SendSupportEmail($data));

            if($mail){
                return true;
            }
        }



        return false;

    }

}
