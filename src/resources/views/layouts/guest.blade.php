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
            <div class="pb-14 bg-right bg-cover custom-bg h-screen">
                <nav class="w-full container mx-auto py-6" x-data="{ open: false }">

                    <div class="w-full flex items-center justify-between">
                        <a class="ml-4 sm:ml-0 flex items-center text-orange-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                           href="{{ route('home') }}">
                            <img src="/img/logo.png" width="100"/>
                        </a>

                        <div class="flex w-1/2 justify-end content-center">
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                                @auth
                                    <a href="{{ route('dashboard') }}" class="text-gray-500 ml-5">Dashboard</a>
                                    <a href="{{ route('documentation') }}" class="text-gray-500 ml-5">Docs</a>
                                    <a href=""  class="text-gray-500 ml-5">FAQ's</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-600 ">Login</a>
                                    <a href="{{ route('register') }}" class="text-gray-500 ml-5">Register</a>
                                    <a href="{{ route('documentation') }}" class="text-gray-500 ml-5">Docs</a>
                                    <a href=""  class="text-gray-500 ml-5">FAQ's</a>
                                @endauth
                            </div>

                                <div class="mr-4 sm:mr-0 flex items-center sm:hidden">
                                    <button @click="open = ! open"
                                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 6h16M4 12h16M4 18h16"/>
                                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Menu
                                    </button>
                                </div>


                        </div>

                    </div>

                    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white  border-b-2 border-orange-400 sm:border-b-0">
                        <div class="pt-2 pb-3 space-y-1">
                            @auth
                                <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('documentation') }}" :active="request()->routeIs('documentation')">
                                    {{ __('Docs') }}
                                </x-jet-responsive-nav-link>
                                @else
                                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                                    {{ __('Login') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                    {{ __('Register') }}
                                </x-jet-responsive-nav-link>
                                <x-jet-responsive-nav-link href="{{ route('documentation') }}" :active="request()->routeIs('documentation')">
                                    {{ __('Docs') }}
                                </x-jet-responsive-nav-link>
                            @endauth
                        </div>
                    </div>

                </nav>

                <div class="px-4">
                {{ $slot }}
                </div>

            </div>
        </div>
        @stack('modals')


        @livewireScripts

    </body>
</html>
