<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index()
    {
     return view('send-email');
    }

    function send(Request $request)
    {
     $user = Auth::user();
     $supportemail = "mayurg@packt.com";

     $this->validate($request, [
      'message' =>  'required',
      'image'   =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'emailcopy'=> 'boolean'
     ]);

     $imageName = time().'.'.$request->image->extension();
     $request->image->move(public_path('images'), $imageName);

     $data = array(
            'message'   =>   $request->message,
            'image'     =>    $imageName,
            'emailcopy' =>   $request->emailcopy
     );


    if($request->get('emailcopy') == 1){

         Mail::to($supportemail)->send(new SendMail($data));
         Mail::to($user['email'])->send(new SendMail($data));

    } else {

        Mail::to($supportemail)->send(new SendMail($data));

    }
     return back()->with('success', 'Thank you for your support enquiry, we will aim to get back to you soon as we can.');

    }

  }

?>
