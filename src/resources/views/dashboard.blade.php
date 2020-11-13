<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto sm:max-w-7xl px-6">
        <div class="flex flex-wrap -mx-3 overflow-hidden py-6 ">

            <div class="my-1 w-full  px-3 pb-12 lg:w-3/5 overflow-hidden">
                <div class="shadow-xl sm:rounded-lg bg-white h-full  sm:pt-6">
                    <x-jet-welcome/>
                </div>
            </div>

            <div class="my-1 w-full px-3 pb-12 lg:w-2/5 overflow-hidden">
                <div class="shadow-xl sm:rounded-lg bg-white px-6 py-6 ">
                    <h3 class="text-3xl mb-5">Support</h3>
                    <p class="pb-3 border-b-2">Don't have the required access or need some assistance? Fill in the form below and one of our
                        team will be in touch.</p>
                    @include('send-email')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
