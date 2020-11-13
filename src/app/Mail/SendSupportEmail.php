<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSupportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =  $this->from('noreply@packt.com')
                    ->with('data', $this->data);

        if(isset($this->data['emailcopy']) && $this->to[0]['address'] == auth()->user()->email){
            $mail->markdown('emails.supportrequestcopy')
            ->subject('Your Packt API Enquiry');

        } else {
            $mail->markdown('emails.supportrequest')
                ->replyTo(auth()->user()->email)
                ->subject('New Packt API Customer Enquiry');
        }

        if(isset($this->data['image'])){
            $mail->attachFromStorage($this->data['image']);
        }

        return $mail;
    }
}
