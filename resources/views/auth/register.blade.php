<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-guest-layout>

    <div class="regcont">
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

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                        <label>
                            
                            <span><x-label for="name" :value="__('Name')" /></span>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </label>
                        <label>
                            <span><x-label for="email" :value="__('Email')" /></span>
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </label>
                        <label>
                            <span><x-label for="password" :value="__('Password')" /></span>
                            <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                        </label>
                        <label>
                            <span><x-label for="password_confirmation" :value="__('Confirm Password')" /></span>
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                        </label>

                        <x-button>
                            {{ __('Sign Up') }}
                        </x-button>
                        
                        {{-- <p class="othersign2">Or Sign Up Using</p>
                        <button type="button" class="btnfbup"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                        <button type="button" class="btntwup"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                        <button type="button" class="btnggup"><i class="fa fa-google" aria-hidden="true"></i></button> --}}
                    
                
                </form>

                <!-- <form method="POST" action="{{ route('register') }}" >
                    
                    @csrf
                    
                    <div class="form2 sign-up" id="Register">
                        <img class="logopic2" src="img/signlogo.png">
                        
                        <label>
                            
                            <span><x-label for="name" :value="__('Name')" /></span>
                            
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </label>
                        <label>
                            <span><x-label for="email" :value="__('Email')" /></span>
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </label>
                        <label>
                            <span><x-label for="password" :value="__('Password')" /></span>
                            <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                        </label>
                        <label>
                            <span><x-label for="password_confirmation" :value="__('Confirm Password')" /></span>
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                        </label>

                        <x-button>
                            {{ __('Sign Up') }}
                        </x-button>
                        
                        {{-- <p class="othersign2">Or Sign Up Using</p>
                        <button type="button" class="btnfbup"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                        <button type="button" class="btntwup"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                        <button type="button" class="btnggup"><i class="fa fa-google" aria-hidden="true"></i></button> --}}
                        <a href="{{ route('admin.login') }}" class="lined-link-sign-up">Admin Login</a>
                    </div> 
                </form> -->
        </x-auth-card>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                <button class="reg__btn">
                    <a href="{{ route('login') }}" class="lined-link-sign-in">Sign In</a>
                </button>
            </div>
        </div>
    </div>
</x-guest-layout>
