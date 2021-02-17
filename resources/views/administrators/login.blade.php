<link rel="stylesheet" href="{{ asset('css/alogin.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-guest-layout>

    <div class="cont">
        <x-auth-card>
            <x-slot name="logo">
                {{-- <a href="/"> --}}
                    <x-application-logo/>
                {{-- </a> --}}
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('admin.auth') }}">
                @csrf

                <label>
                <!-- Email Address -->
                    <span><x-label for="email" :value="__('Email')" /></span>

                    <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
                </label>

                <label>
                <!-- Password -->
                    <span><x-label for="password" :value="__('Password')" /></span>

                    <x-input id="password" class="block w-full mt-1"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </label>

                <label>
                <!-- Remember Me -->
                {{-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                <p class="forgot-pass">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </p>

                <x-button>
                    {{ __('Login') }}
                </x-button>

                <a href="{{ route('login') }}" class="lined-link-sign-in">User Login</a>
            
            </form>

        </x-auth-card>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text">
                    <h2>Admin Login</h2>
                    <p>Login to access your admin account.</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
