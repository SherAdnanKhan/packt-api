@component('mail::message')
# Hello!

You are receiving this email as you (hopefully) signed up to the Packt API.

Please click the button below to verify your email address

@component('mail::button', ['url' => $url, 'color' => 'orange'])
    Verify Email Address
@endcomponent

If you did not create an account, no further action is required.

@component('mail::subcopy')
If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: <a href="{{ $url }}">{{ $url }}</a>
@endcomponent

Thanks,<br>
The Packt Team
@endcomponent
