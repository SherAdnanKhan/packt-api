@component('mail::message')
# Packt API Support Enquiry

A support query has been raised by {{ $data['user']['name'] }} ({{$data['user']['email']}}). Please see the details of their enquiry below:

**Enquiry Details**\
Type Of Enquiry: {{ $data['contact_reason'] }}\
Message: {{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
