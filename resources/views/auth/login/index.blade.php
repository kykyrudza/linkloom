@extends('layouts.AuthLayout')

@section('title')
    Login
@endsection

@section('auth_content')
    <x-auth.form-container class="md:h-[508px] md:w-[508px] md:my-0 my-10 h-[327px] w-[327px]">
        <x-auth.form-header title='Login' />
        <form method="POST" action="{{ route('login.store')  }}" class="mx-auto w-full max-w-5xl">
            @csrf
            <div class=" md:grid gap-7">
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
                </div>
            </div>
            <div class="mt-4 text-center">
                <x-auth.register-link url="{{ route('register') }}">{{ __('Don`t have account?') }}</x-auth.register-link>
                <x-auth.form-button>{{ __('Log In') }}</x-auth.form-button>
            </div>
        </form>
    </x-auth.form-container>
@endsection
