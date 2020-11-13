<?php

namespace App\Services;

use App\Mail\SendSupportEmail;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Mail;

class SupportEmailService extends BaseService {

    use ValidatesRequests;

    public function process(){


        $supportEmail = ($this->request->contact_reason == 'access') ? config('app.access_email') : config('app.support_email');

        $this->validate($this->request, [
            'contact_reason' => 'required',
            'message' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'emailcopy' => 'boolean'
        ]);

        if ($this->request->has('image')) {
            $file = $this->request->image->store('supportdocuments');
        }

        $data = array(
            'contact_reason' => $this->request->contact_reason,
            'message' => $this->request->message,
            'image' => $file ?? null,
            'emailcopy' => $this->request->emailcopy,
            'user' => $this->request->user()
        );

        if ($this->request->get('emailcopy') == 1) {
            $mail = Mail::to($supportEmail)->send(new SendSupportEmail($data));
            $customerEmail = Mail::to($this->request->user()->email)->send(new SendSupportEmail($data));

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
