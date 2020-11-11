<x-guest-layout>



        <div class="container pt-10 md:pt-41  mx-auto flex flex-wrap flex-col justify-between md:flex-row items-center">

            <!--Left Col-->
            <div class="flex flex-col w-full lg:w-2/5  justify-center lg:items-start overflow-y-hidden">
                <h1 class="my-4 text-4xl md:text-6xl text-orange-500 font-bold leading-tight text-center md:text-left slide-in-bottom-h1">Connect Your App To Packt</h1>
                <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">Not sure where to start? We’ve put together some handy guides and reference documentation you can use to start building. </p>

                <p class="text-orange-500 font-bold pb-8 lg:pb-6 text-center md:text-left fade-in">Get Started!</p>
                <div class="flex w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in">
                    <a href="{{ route('documentation') }}" class="bg-white text-orange-500 hover:bg-orange-500 hover:text-white font-semibold hover:text-white py-2 px-4 border border-orange-500 hover:border-transparent rounded">
                        Read The Docs!
                    </a>
                    <a href="{{ route('register') }}" class="ml-5 bg-orange-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded">
                        Sign Up To Access!
                    </a>
                </div>

            </div>

            <!--Right Col-->
            <div class="w-full lg:w-2/5 xl:w-3/6 py-6 overflow-y-hidden place-self-end lg:block hidden" >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-500  text-orange-500 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>

{{--                <img src="/img/connect.png" />--}}
            </div>

            <!--Footer-->
            <div class="w-full pt-10 pb-6 text-sm text-center  fade-in">
                <a class="text-gray-500 no-underline hover:no-underline" href="#">The word 'Packt' and the Packt logo are registered trademarks belonging to Packt Publishing Limited. All rights reserved</a>
            </div>

        </div>

    </div>

</div>
</x-guest-layout>
