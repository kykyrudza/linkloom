@extends('layouts.AuthLayout')

@section('title')
    Register
@endsection

@section('auth_content')
    <x-auth.form-container class="md:h-[690px] md:w-[910px] md:my-0 my-10 h-[846px] w-[327px]">
        <x-auth.form-header title='Register' />
        <form method="POST" action="{{ route('register.store')  }}" class="mx-auto w-full max-w-5xl">
            @csrf
            <div class=" md:grid md:grid-cols-2 gap-7">
                <div>
                    <x-auth.form-input
                        type="text"
                        name="nickname"
                        placeholder="{{ __('Your nickname') }}"
                        label="{{ __('Nickname') }}"
                        autofocus
                    >
                    </x-auth.form-input>

                    <x-auth.form-input
                        type="text"
                        name="first_name"
                        placeholder="{{ __('John') }}"
                        label="{{ __('First Name') }}"
                    >
                    </x-auth.form-input>

                    <x-auth.form-input
                        type="text"
                        name="last_name"
                        placeholder="{{ __('Doe') }}"
                        label="{{ __('Last Name') }}"
                    >
                    </x-auth.form-input>
                </div>
                <div>
                    <x-auth.form-input
                        type="email"
                        name="email"
                        placeholder="{{ __('john@example.com') }}"
                        label="{{ __('Email') }}"
                    >
                    </x-auth.form-input>

                    <x-auth.form-input
                        type="password"
                        name="password"
                        placeholder="{{ __('Minimum 8 characters') }}"
                        label="{{ __('Password') }}"
                    >
                    </x-auth.form-input>

                    <x-auth.form-input
                        type="password"
                        name="password_confirmation"
                        placeholder="{{ __('Minimum 8 characters') }}"
                        label="{{ __('Confirm Password') }}"
                    >
                    </x-auth.form-input>
                </div>
            </div>
            <div class="mt-4 text-center">
                <x-auth.register-link url="{{ route('login') }}">{{ __('Already have account?') }}</x-auth.register-link>
                <x-auth.form-button>{{ __('Sign up') }}</x-auth.form-button>
            </div>
        </form>
    </x-auth.form-container>
@endsection
