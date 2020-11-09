<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl flex mx-auto sm:px-6 lg:px-12">
            <div class="bg-white w-3/5 overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
            <div class="w-2/5 ml-5 bg-white max-w-2xl overflow-hidden shadow-xl sm:rounded-lg sm:px-6 sm:py-6">
                <h3 class="text-3xl mb-5">Support</h3>
                <p>Don't have the required access or need some assistance? Fill in the form below and one of our team will be in touch.</p>
                [FORM GOES HERE]
            </div>
        </div>
    </div>

</x-app-layout>
