<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSupportEmail;

class SendEmailController extends Controller
{
    function index()
    {
     return view('send-email');
    }

    function send(Request $request)
    {
     $user = Auth::user();
     $supportemail = config('app.support_email');

     $this->validate($request, [
      'contact_reason'=> 'required',
      'message' =>  'required',
      'image'   =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'emailcopy'=> 'boolean'
     ]);

    $imageName = time().'.'.$request->image->extension();
/*   $request->image->move(public_path('images'), $imageName);*/
     $file = $request->image->store('supportdocuments');

     $data = array(
            'contact_reason'=> $request->contact_reason,
            'message'   =>   $request->message,
            'image'     =>    $file,
            'emailcopy' =>   $request->emailcopy
     );

    if($request->get('emailcopy') == 1){

         Mail::to($supportemail)->send(new SendSupportEmail($data));
         Mail::to($user['email'])->send(new SendSupportEmail($data));

    } else {

        Mail::to($supportemail)->send(new SendSupportEmail($data));

    }
     return back()->with('success', 'Thank you for your support enquiry, we will aim to get back to you soon as we can.');

    }

  }

?>
