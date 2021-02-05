<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-guest-layout>
    <div class="cont">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <x-forgot>

            <div style="text-align: center; padding: 25px 120px 25px; position: relative; bottom: 100px;">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <form method="POST" action="{{ route('password.email') }}" style="position: relative; bottom: 90px;">
                @csrf

                <label>
                <!-- Email Address -->
                    <span><x-label for="email" :value="__('Email')" /></span>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                
                </label>

                <x-button style="position: relative; top: 15px;">
                    {{ __('Email Password Reset Link') }}
                </x-button>
                
            </form>
        </x-forgot>
    </div>
</x-guest-layout>
