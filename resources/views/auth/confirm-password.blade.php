<link rel="stylesheet" href="{{ asset('css/security.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-guest-layout>
    
    <div class="cont">
        <x-auth-card>

            <x-slot name="logo">
                {{-- <a href="/"> --}}
                    <x-application-logo />
                {{-- </a> --}}
            </x-slot>

            <div class="mb-4 text-sm text-gray-600" style="text-align:center;padding:35px;">
            {{ __('This is a secure area of the application.
            Please confirm your password before continuing.') }}
            </div>

       
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ url('user/confirm-password') }}" >
                @csrf


                    <label>
                    <!-- Password -->
                        <span><x-label for="password" :value="__('Password')" /></span>

                        <x-input id="password" class="block w-full mt-1"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    
                </label>

                <br>
                
                
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
                
            </form>

        </x-auth-card>

    </div>
</x-guest-layout>

<script>
    document.querySelector('.img__btn').addEventListener('click', function() {
      document.querySelector('.cont').classList.toggle('s--signup');
    });
</script>


