@extends('layouts.layout')

@section('title')
    Profile - {{ $nickname }}
@endsection

@section('content')

    <div class="text-white mx-auto max-w-screen-2xl px-5">
        <!-- Моб личный кабинет -->
        <div class="block xs:hidden">
            <div>
                <div class="text-center pb-6">{{ $nickname }}</div>
                <div class="w-full h-[120px] custom-box rounded-[24px] flex flex-col items-center justify-center overflow-hidden">
                    <div class="flex h-full w-full items-center overflow-x-auto">
                        <div class="w-1/3 flex justify-center ml-3 bg-cover bg-center h-20 w-20" style="background-image: url('{{ asset($avatarUrl) }}'); border-radius: 15px;">
                            <!-- Если нужно, можно добавить дополнительные элементы сюда -->
                        </div>

                        <div class="w-2/3 pl-3 pr-5 text-sm font-light whitespace-nowrap flex items-center">
                            <div>
                                <p>{{ $firstName . ' ' . $lastName }}</p>
                                <p id="email" class="pr-5 cursor-pointer">e-mail: {{$email}}</p>
                            </div>
                        </div>
                    </div>
                    <div id="custom-alert" class="fixed top-6 bg-teal-100 border-2 border-teal-500 rounded-[10px] text-teal-900 px-4 py-3 mx-6 shadow-md opacity-0 transition-opacity duration-300 ease-in-out hidden" role="alert">
                        <div class="flex">
                            <div class="flex items-center justify-between">
                                <span class="text-sm">Email адрес скопирован в буфер обмена!</span>
                                <button class="ml-4 text-lg font-semibold hover:text-gray-200" aria-label="Close">×</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center mt-4 justify-center text font-light">
                    <button class="w-1/3 min-h-[35px] text-xs hover:text-black hover:bg-white ltr rounded-s-full custom-box">
                        {{__('Настройки')}}
                    </button>
                    <button class="group w-1/3 flex justify-center  items-center min-h-[35px] custom-box p-0 m-0 h-full text-black hover:bg-white group-hover:text-white transition duration-200 ease-in-out">
                        <img src="{{ asset('images/achievement/achievement-1.png') }}" alt="" class="transition h-[30px] duration-200 ease-in-out group-hover:filter group-hover:grayscale group-hover:brightness-0">
                    </button>
                    <button class="w-1/3 min-h-[35px] text-xs hover:text-black hover:bg-white rtl rounded-r-full custom-box">
                        {{__('Добавить')}}
                    </button>
                </div>
                <div class="flex items-center mt-4 justify-center text-sm">
                    <button class="w-1/2 min-h-[35px] hover:border-opacity-100 ltr rounded-s-full custom-box">
                        Figma
                    </button>
                    <button class="w-1/2 min-h-[35px] hover:border-opacity-100 rtl rounded-r-full custom-box">
                        Web
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-4 my-5">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="custom-box rounded-[20px]">
                            <a href="#">
                                <img src="{{ asset('images/test-project/default-project-image.png') }}" class="w-full h-full object-cover p-3 rounded-[20px]" alt="">
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Личный кабинет для планшета -->
        <div class="hidden xs:block lg:hidden">
            <div class="">планшет</div>
        </div>

        <!-- ПК личный кабинет -->
        <div class="hidden lg:block">
            <div class="grid grid-cols-9 gap-x-2 mb-10">
                <!-- Левая колонка -->
                <div class="row-span-2 w-full h-[756px] col-span-2">
                    <div class="w-full h-full custom-box rounded-[30px] px-5 grid grid-rows-[auto_1fr_auto_auto] gap-4">
                        <!-- Аватарка -->
                        <div class="flex justify-center items-center row-start-1 row-end-2">
                            <div class="relative w-full max-w-[280px] mt-5 h-auto aspect-square custom-box rounded-[40px] overflow-hidden">
                                <div class="absolute inset-0 bg-center m-4 bg-cover rounded-[30px]"
                                     style="background-image: url('{{ asset($avatarUrl) }}');">
                                </div>
                            </div>
                        </div>

                        <!-- Описание -->
                        <div class="flex items-start row-start-2 text-sm row-end-3 whitespace-normal break-words overflow-auto">
                            @if($description)
                                {!! $description !!}
                            @else
                                <p class="text-white opacity-50">{{__('Описание отсутствует.')}}</p>
                            @endif
                        </div>


                        <!-- Кнопки соцсетей -->
                        <div class="flex justify-center row-start-3 row-end-4 mx-5 space-x-4">
                            @foreach($user->socialLinks as $link)
                                <a href="{{ $link->url }}" class="text-white custom-box rounded-full h-10 w-10 flex items-center justify-center hover:text-opacity-30" target="_blank">
                                    <i class="fab fa-{{ strtolower($link->platform) }} fa-lg"></i>
                                </a>
                            @endforeach
                        </div>

                        <!-- Кнопка настройки -->
                        @if ($currentUserId == $userId)
                            <div class="flex justify-center row-start-4 row-end-5 mb-5">
                                <a href="{{ route('logout') }}" class="w-[40px] flex duration-0 justify-center items-center h-[40px] mr-3 hover:text-black hover:bg-white rounded-full custom-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                    </svg>
                                </a>
                                <a href="{{ route('profile.settings', ['id' => $userId, 'nickname' => $nickname ]) }}" class="w-[70%] duration-0 h-[40px] text-md hover:text-black hover:bg-white rounded-full custom-box">
                                    <button class="w-full h-full">
                                        {{__('Настройки')}}
                                    </button>
                                </a>
                            </div>
                        @else

                        @endif
                    </div>
                </div>
                <!-- Правая колонка -->
                <div class="col-span-7 flex flex-col h-full xl:ml-3">
                    <!-- Верхний правый блок с фиксированной высотой -->
                    <div class="h-[150px] custom-box  rounded-[40px]">
                        <div class="flex px-5 h-full">
                            <div class=" w-3/4 flex items-center justify-start">
                                <div class="pl-5">
                                    <p class="text-3xl pb-2">{{ $nickname }}</p>
                                    <p class="text-gray-400 text-lg pt-2">{{ $firstName . ' ' . $lastName }}</p>
                                    <p id="email" class="cursor-pointer text-gray-400 text-lg">e-mail: {{$email}}</p>
                                </div>
                            </div>
                            <div class="w-1/4 flex items-center justify-center">
                                <a href="#" class="group">
                                    <img class="group-hover:opacity-0 xl:h-[100px] xl:w-[100px] h-[68px] w-[69px] group-hover:hidden" src="{{asset('images/achievement/achievement-1.png')}}" alt="achievement">
                                    <img class="hidden opacity-0 group-hover:opacity-100 group-hover:inline-block" src="{{asset('images/achievement/achievement-1-white.png')}}" alt="achievement">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Нижний правый блок, занимающий оставшуюся высоту, с фиксированным отступом -->
                    <div class="flex-grow h-[586px] custom-box mt-4  rounded-[40px] px-10">
                        <div class="h-full pb-10">
                            <div class="h-1/6 ">
                                <div class="grid grid-rows-1 grid-cols-12 gap-1 h-full">
                                    <div class="col-span-6 h-full flex items-center">
                                        <div class="relative">
                                            <input
                                                    type="text"
                                                    placeholder="Поиск..."
                                                    class="px-4 py-2 pl-10 w-[270px] h-[45px] custom-box rounded-[40px] focus-visible:ring-0"
                                            />
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2  h-full flex items-center">
                                        <button class="w-full text-md h-[45px] hover:border-2 hover:border-opacity-100 rounded-full custom-box">
                                            Figma
                                        </button>
                                    </div>
                                    <div class="col-span-2  h-full flex items-center">
                                        <button class="w-full text-md h-[45px] hover:border-2 hover:border-opacity-100 rounded-full custom-box">
                                            Web
                                        </button>
                                    </div>
                                    <div class="col-span-2  h-full flex items-center">
                                        <button class="w-full text-md h-[45px] hover:border-2 hover:border-opacity-100 rounded-full custom-box">
                                            {{__('Добавить')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="h-5/6 custom-box rounded-[40px]">
                                <div class="my-auto mt-6">
                                    <div class="overflow-x-auto custom-scrollbar">
                                        <div class="flex p-4">
                                            @for ($i = 0; $i < 10; $i++)
                                                <div class="custom-box mx-3 2xl:h-[350px] 2xl:w-[350px] h-[330px] w-[330px] rounded-[40px] flex-shrink-0">
                                                    <a href="#">
                                                        <img src="{{ asset('images/test-project/default-project-image.png') }}" class="w-full h-full object-cover p-6 rounded-[40px]" alt="">
                                                    </a>
                                                </div>
                                            @endfor
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
@endsection
