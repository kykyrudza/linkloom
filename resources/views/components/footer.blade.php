<footer class="h-[260px]">
    <div class="h-full">
        <div class="container text-white h-full mx-auto px-4 text-opacity-50">
            <div class="flex flex-col justify-center h-full items-center ">
                <a href="{{ route('main')  }}" class="h-[110px] flex justify-center items-center">
                    <img src="{{ asset('images/linkloom.png') }}" alt="Logo" class="max-h-[20px] sm:max-h-[40px] md:max-h-[60px] lg:max-h-[80px] xl:max-h-[100px]">
                </a>
                <nav class="sm:flex gap-6">
                    <ul class="flex flex-wrap justify-center mb-3 md:mb-0 gap-6 text-md xl:text-lg 2xl:text-2xl">
                        <li class="footer__lst">
                            <a href="{{ route('main') }}"
                               class="{{ request()->routeIs('main') ? 'text-white' : 'text-slate-500' }} transition-all ease-in-out hover:text-white">
                                Главная
                            </a>
                        </li>

                        <li class="footer__lst">
                            <a href="{{ route('main') }}"
                               class="{{ request()->routeIs('contacts') ? 'text-white' : 'text-slate-500' }} transition-all ease-in-out hover:text-white">
                                Контакты
                            </a>
                        </li>

                        <li class="footer__lst">
                            <a href="{{ route('main') }}"
                               class="{{ request()->routeIs('projects') ? 'text-white' : 'text-slate-500' }} transition-all ease-in-out hover:text-white">
                                Проекты
                            </a>
                        </li>
                    </ul>
                    <ul class="flex flex-wrap justify-center gap-6 text-md xl:text-lg 2xl:text-2xl">
                        <li class="footer__lst">
                            <a href="{{ route('main') }}"
                               class="{{ request()->routeIs('about') ? 'text-white' : 'text-slate-500' }} transition-all ease-in-out hover:text-white">
                                Про нас
                            </a>
                        </li>
                        <li class="footer__lst">
                            <a href="{{ route('main') }}"
                               class="{{ request()->routeIs('education') ? 'text-white' : 'text-slate-500' }} transition-all ease-in-out hover:text-white">
                                Обучение
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="flex justify-center items-center text-white my-10">
                    <a href="#" class="icon__bounce fa-2x mx-4"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon__bounce fa-2x mx-4"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="icon__bounce fa-2x mx-4"><i class="fab fa-telegram-plane"></i></a>
                    <a href="#" class="icon__bounce fa-2x mx-4"><i class="fab fa-discord"></i></a>
                </div>
            </div>
        </div>
        <div style="background-color: rgba(21, 21, 23, 1);" class=" py-3 w-full text-slate-500 hidden md:block ">
            <p class="text-center text-xl">Copyright 2024 LinkLoom. All rights reserved</p>
        </div>
    </div>
</footer>