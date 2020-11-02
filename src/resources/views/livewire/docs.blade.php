<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pack+ API Documentation
        </h2>
    </x-slot>
    <div class="py-12" x-data="{open: false}">
        <div class="max-w-7xl max- mx-auto sm:px-6 max-w lg:px-8 transition duration-500 ease-in-out" x-bind:class="{'max-w-full' : open}">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-0">
                <div class="lg:flex -mx-6 relative">
                    <div class="absolute top-0 right-5 mb-10 mt-2 hover:text-gray-900 font-medium  hover:text-gray-900 font-medium text-gray-700" >
                        <a href="#" @click="open = !open" x-bind:class="{'text-orange-700' : open}">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                            </svg>
                        </a>
                    </div>
                    <div id="sidebar"
                         class="fixed bg-gray-200 inset-0 h-full bg-white z-90 w-full border-b -mb-16 lg:-mb-0 lg:static lg:h-auto lg:overflow-y-visible lg:border-b-0 lg:pt-0 lg:w-1/4 lg:block lg:border-0 xl:w-1/5 hidden pt-16">
                        <div id="navWrapper" class="h-full overflow-y-auto">
                            <nav
                                class="px-6 pt-6 mt-10 overflow-y-auto text-base lg:text-sm lg:py-0 lg:pl-6 lg:pr-8 sticky?lg:h-(screen-16)">


                                <div class="mb-10">
                                    <a href=""
                                       class="flex items-center px-2 -mx-2 py-1 hover:text-gray-900 font-medium text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  class="w-4 h-4 stroke-current text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <span class="ml-3">Overview</span>
                                    </a>
                                    <a
                                        href=""
                                        class="flex items-center px-2 -mx-2 py-1 hover:text-gray-900 font-medium mt-3 lg:mt-1 text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  class="w-4 h-4 stroke-current text-orange-300 hover:text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <span class="ml-3">Packt Product API</span>
                                    </a>
                                    <a href="/course"
                                       class="flex items-center px-2 -mx-2 py-1 hover:text-gray-900 font-medium mt-3 lg:mt-1 text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  class="w-4 h-4 stroke-current text-orange-300 hover:text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <span class="ml-3">FAQ's</span>
                                    </a>
                                    <a href="https://blog.tailwindcss.com"
                                       class="flex items-center px-2 -mx-2 py-1 hover:text-gray-900 font-medium mt-3 lg:mt-1 text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  class="w-4 h-4 stroke-current text-orange-300 hover:text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <span class="ml-3">Reference</span>
                                    </a>
                                </div>

                                <div class="mb-8">
                                    <h5 class="mb-3 lg:mb-2 uppercase tracking-wide font-bold text-sm lg:text-xs text-gray-500">
                                        Overview</h5>
                                    <ul>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#environments"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="API environments"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">Environments</span>
                                            </a>
                                        </li>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#format"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="API Formatting"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">Format</span>
                                            </a>
                                        </li>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#errors"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="Error Handling"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">Error Handling</span>
                                            </a>
                                        </li>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#authentication"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="Authentication"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">Authentication</span>
                                            </a>
                                        </li>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#callbacks"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="Callback"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">Callbacks</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mb-8">
                                    <h5 class="mb-3 lg:mb-2 uppercase tracking-wide font-bold text-sm lg:text-xs text-gray-500">
                                        Packt Product API</h5>
                                    <ul>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#environments"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="GET API"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">GET API</span>
                                            </a>
                                        </li>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#format"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="PUT API"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">PUT API</span>
                                            </a>
                                        </li>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#errors"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="POST API"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">POST API</span>
                                            </a>
                                        </li>
                                        <li class="mb-3 lg:mb-1">
                                            <a
                                                href="/docs/#authentication"
                                                class="transition duration-200 ease-in-out relative block hover:translate-x-2px hover:text-gray-900 text-gray-600 font-medium"
                                                title="DELETE"
                                            >
                                                <span class="rounded absolute inset-0 bg-teal-200 opacity-0"></span>
                                                <span class="relative">DELETE</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div id="content-wrapper"
                         class="min-h-screen w-full lg:static lg-max-h-full lg:overflow-visible lg:w-3/4">
                        <div id="content">
                            <div id="app" class="flex">
                                <div class="pb-16 w-full pt-12 lg:pt-5">
                                    <div class="markdown mb-6 px-6 max-w-3xl mx-auto lg:ml-0 lg:mr-auto xl:mx-0 xl:px-12 xl:w-3/4">
                                        <div class="flex items-center markdown">
                                            <h1 class="text-4xl">Overview</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
