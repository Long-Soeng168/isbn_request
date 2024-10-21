@extends('layouts.isbn')

@section('content')
    <div class="">

        <header class="text-center">
            <h3 class="mt-2 text-xl font-bold font-poppins">{{ __('messages.login') }}</h3>
        </header>

        <!-- Publisher Details Section -->
        <section class="mt-6">

            <form method="POST" action="{{ url('/publisher_login') }}">
                @csrf
                {{-- <h3 class="text-xl font-bold">
                    {{ __('messages.loginDetails') }}
                </h3> --}}

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                         autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password"
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                </div>
        </section>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ url('publisher_register') }}">
                {{ __('Don\'t Has Account? ') }} <strong class="underline">Click Here</strong>
            </a>
            <x-submit-button class="ms-4">
                {{ __('Login') }}
            </x-submit-button>
        </div>
        </form>

    </div>
@endsection
