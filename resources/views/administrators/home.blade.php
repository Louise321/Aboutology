<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Aboutology') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Scripts -->
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="{{asset('js/vendor.js')}}" defer></script>
        <script src="{{ asset('js/app2.js') }}" defer></script>

  
        
    </head>
    
    <body>

        <div class="wrapper">
            @include('inc.asidebar')

            <div class="content-wrapper" style="width:100%" >
        
                @include('inc.anavbar')
            
                {{-- <x-slot name="header">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800">
                        {{ __('Dashboard') }}
                    </h2>
                </x-slot> --}}

                <div class="py-12">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                Admin Page {{ Auth::user()->name }}!
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

                @include('inc.footer')
            
            </div>
        </div>


    </body>
</html>
