<div class="h-screen">
    <div class=" absolute inset-0 bg-center bg-no-repeat bg-contain bg-[url('/public/images/backroundmain1.png')] -z-10"></div>
    <div class="flex flex-col min-h-screen p-5">
        <div class="flex-grow flex flex-col justify-center items-center pt-28 pb-16 w-full ">
            <div class="flex flex-col items-center mb-9">
                <div class="flex items-center">
                    <p class="text-xl sm:text-2xl md:text-5xl lg:text-7xl 2xl:text-8xl text-white">Welcome to</p>
                    <img class="inline ml-1.5 -mb-0.5 sm:-mb-1.5 lg:ms-8 lg:-mb-3 2xl:ml-10 2xl:-mb-3 xl:ml-8 md:ml-3 w-auto h-4 sm:h-5 md:h-8 lg:h-12 2xl:h-16" src="{{ asset('images/linkloomlogo.png') }}" alt="">
                </div>
                <p class="max-w-5xl text-center text-white md:px-32 text-md md:text-xl lg:text-2xl 2xl:text-3xl 2xl:px-16 mt-4">{{ __('Наши двери открыты для всех, кто хочет поделиться своими творческими проектами с миром') }}</p>
                <div class=" pt-8 pb-16 xl:block hidden">
                    <a href="{{ route('register') }}" class="text-2xl font-normal leading-6 rounded-full bg-red-600 px-16 py-2 text-white">Get started</a>
                </div>
            </div>
        </div>
        <div class="flex justify-center pb-24 xl:hidden">
            <a href="{{ route('register') }}" class=" text-xl sm:text-2xl font-normal leading-6 rounded-full bg-red-600 px-14 py-2 text-white">Get started</a>
        </div>
    </div>
</div>