@component('mail::message')
# Packt API Support Enquiry

Hello {{ $data['user']['name'] }},

You submitted an enquiry via the Packt API dashboard and requested a copy of the request. Please find the request
details below.

**Enquiry Details**\
Type Of Enquiry: {{ $data['contact_reason'] }}\
Message: {{ $data['message'] }}


One of our team will respond to you as soon as possible.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
