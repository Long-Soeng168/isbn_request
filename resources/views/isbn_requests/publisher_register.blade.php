@extends('layouts.isbn')

@section('content')
    <div class="">

        <header class="text-center">
            <h3 class="mt-2 text-xl font-bold font-poppins">{{ __('messages.register') }}</h3>
        </header>

        <!-- Publisher Details Section -->
        <section class="mt-6">

            <form method="POST" action="{{ url('/publisher_register') }}">
                @csrf
                <h3 class="text-xl font-bold">
                    {{ __('messages.loginDetails') }}
                </h3>

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

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                        name="password_confirmation"  autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>


                <h3 class="pt-12 text-xl font-bold">
                    {{ __('messages.userDetails') }}
                </h3>
                <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-1">
                    <div class="">
                        <x-input-label for="name" :value="__('messages.name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                             autocomplete="username" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="">
                        <x-input-label for="address" :value="__('messages.address')" />
                        <x-text-input id="address" class="block w-full mt-1" type="text" name="address" :value="old('address')"
                             autocomplete="address" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>
                    <div class="">
                        <x-input-label for="phone" :value="__('messages.phone')" />
                        <x-text-input id="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')"
                             autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <div class="">
                        <x-input-label for="facebookName" :value="__('messages.facebookName')" />​
                        <x-text-input id="facebookName" class="block w-full mt-1" type="text" name="facebookName" :value="old('facebookName')"
                             autocomplete="facebookName" />
                        <x-input-error :messages="$errors->get('facebookName')" class="mt-2" />
                    </div>
                    <div class="">
                        <x-input-label for="userType" :value="__('messages.userType')" />
                        <x-select-option class="block w-full mt-1" id="userType" name="user_type">
                            <option value="">{{ __('messages.select') }}</option>
                            <option value="publisher" {{ old('user_type') == 'publisher' ? 'selected' : '' }}>
                                {{ __('messages.publisher') }}
                            </option>
                            <option value="author" {{ old('user_type') == 'author' ? 'selected' : '' }}>
                                {{ __('messages.author') }}
                            </option>
                            <option value="librarian" {{ old('user_type') == 'librarian' ? 'selected' : '' }}>
                                {{ __('messages.librarian') }}
                            </option>
                            <option value="individual" {{ old('user_type') == 'individual' ? 'selected' : '' }}>
                                {{ __('messages.individual') }}
                            </option>
                        </x-select-option>
                        <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                    </div>

                </div>

        </section>

        <!-- New Publishers Section -->
        <section class="mt-8">
            <x-input-label class="text-xl font-bold" for="publicationsEachYear" :value="__('messages.publicationsEachYear')" />
            <p class="mt-2 text-sm">Estimate the quantity of publications you produce each year:</p>
            <div class="flex items-center mt-4 space-x-4">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="publicationsEachYear" value="less_than_1" class="border rounded">
                    <span>Less than 1</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="publicationsEachYear" value="1_to_2" class="border rounded">
                    <span>1 - 2</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="publicationsEachYear" value="3_to_10" class="border rounded">
                    <span>3 - 10</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="publicationsEachYear" value="more_than_10" class="border rounded">
                    <span>More than 10</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('publicationsEachYear')" class="mt-2" />
        </section>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ url('publisher_login') }}">
                {{ __('Already Has Account?') }} <strong class="underline">Click Here</strong>
            </a>
            <x-submit-button class="ms-4">
                {{ __('Register') }}
            </x-submit-button>
        </div>
        </form>

    </div>
@endsection
