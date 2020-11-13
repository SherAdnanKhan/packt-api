<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto"/>
    </div>

    <div class="mt-8 text-2xl">
        Welcome to your Packt API dashboard!
    </div>

    <div class="mt-6 text-gray-500">
        The Packt API gives you access to our network of API's that will in turn provide you with information and
        content related to our extensive catalog of products.
    </div>
</div>


<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2  sm:h-full">
    <div class="p-6">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                 viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{!! route('documentation') !!}">Documentation</a>
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                We have built our documentation with simplicity in mind. Providing a easy to use navigation that is
                clearly explained with functional examples.
            </div>

            <a href="{{ route('documentation') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Explore the documentation</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a
                    href="/dashboard">Work With Us</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Not working with us yet? No worries, simply use the support form and one of our team will get back to
                you to understand your API & access requirements.
            </div>

        </div>
    </div>
</div>
