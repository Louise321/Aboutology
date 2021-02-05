<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-guest-layout>
    
    <div class="cont">
        <x-auth-card>

            <x-slot name="logo">
                {{-- <a href="/"> --}}
                    <x-application-logo />
                {{-- </a> --}}
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" >
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

                <!-- Remember Me -->
                {{-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                {{-- <div class="flex items-center justify-end mt-4"> --}}
                <p class="forgot-pass">    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </p>
                
                <x-button>
                    {{ __('Sign In') }}
                </x-button>

                {{-- <p class="othersign">Or Sign Up Using</p>
                <button class="btnfb"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                <button class="btntw"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                <button class="btngg"><i class="fa fa-google" aria-hidden="true"></i></button> --}}
                <a href="{{ route('admin.login') }}" class="lined-link-sign-in">Admin Login</a>
                
                
            </form>

        </x-auth-card>
            

            <!-- Moving Shade -->
            <!-- <div class="sub-cont">
                <div class="img">
                    <div class="img__text m--up">
                        <h2>New here?</h2>
                        <p>Sign up and discover great amount of new opportunities!</p>
                    </div>
                    {{-- <div class="img__text m--in">
                        <h2>One of us?</h2>
                        <p>If you already has an account, just sign in. We've missed you!</p>
                    </div> --}}
                    <div class="img__btn">
                        <span class="m--in">Sign In</span>
                    </div>
                    {{-- <div class="img__type m--up">
                        <p>USER SIGN UP</p>
                    </div>
                    <div class="img__type m--in">
                        <p>USER SIGN IN</p>
                    </div> --}}
                </div> -->

        <div class="sub-cont">
            <div class="img">
                <div class="img__text">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <button class="reg__btn">
                    <a href="{{ route('register') }}" class="lined-link-sign-in">Sign Up</a>
                </button>
            </div>
        </div>
        

    </div>
</x-guest-layout>

<script>
    document.querySelector('.img__btn').addEventListener('click', function() {
      document.querySelector('.cont').classList.toggle('s--signup');
    });
</script>
