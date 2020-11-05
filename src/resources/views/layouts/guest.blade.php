<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <div class="h-screen pb-14 bg-right bg-cover custom-bg">
                <div class="w-full container mx-auto p-6">

                    <div class="w-full flex items-center justify-between">
                        <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                           href="{{ route('home') }}">
                            <img src="/img/logo.png" width="100"/>
                        </a>

                        <div class="flex w-1/2 justify-end content-center">
                            <a href="{{ route('login') }}" class="text-gray-600 ">Login</a>
                            <a href="{{ route('register') }}" class="text-gray-500 ml-5">Register</a>
                            <a href=""  class="text-gray-500 ml-5">FAQ's</a>
                        </div>

                    </div>

                    {{ $slot }}

                </div>
            </div>
        </div>
        @stack('modals')


        @livewireScripts

    </body>
</html>
