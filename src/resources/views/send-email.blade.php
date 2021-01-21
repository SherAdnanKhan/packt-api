<div class="container box mt-4">
    @if (count($errors) > 0)
        <div class="bg-red-100 border-l-4 border-red-500 text-orange-700 p-2 mb-2" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    @if ($message = session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
        @else
    <form method="post" action="{{url('send-email/send')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group reason_contact mb-3">
            <strong class="text-gray-500 font-bold">Reason For Contact</strong><br>
            <label class="flex items-center space-x-4">
                <input type="radio" id="general_contact" name="contact_reason" value="general"
                       class="">
                <span>General Support</span>
            </label>
            <label class="flex items-center space-x-4">
                <input type="radio" id="access_request" name="contact_reason" value="access">
                <span>Access Request</span>
            </label>
        </div>
        <div class="form-group mb-3">
            <label class="text-gray-500 font-bold">Message</label>
            <textarea max-legth="4000" name="message"
                      class="form-control bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-400"></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="text-gray-500 font-bold">Attachment</label>
            <input type="file" name="image" class="form-control bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-400">
        </div>
        <div class="form-group checkbox-email mb-3">
            <label>
                <input type="checkbox" id="emailcopy" name="emailcopy" value="1">
                <span class="text-gray-500 font-bold">Email a Copy</span>
            </label>
        </div>
        <div class="form-group text-right">
            <button class="bg-orange-500 hover:bg-orange-700 hover:border-orange-700 text-white font-bold py-2 px-4 border border-orange-500 rounded">
                Send Support Request
            </button>        </div>
    </form>
        @endif
</div>
