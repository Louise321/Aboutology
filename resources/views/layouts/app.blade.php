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
            @include('inc.sidebar')

        {{-- <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation') --}}

            <div class="content-wrapper" style="width:100%" >
        
                @include('inc.navbar')

                {{-- Page Content --}}
                {{-- @yield('content') --}}

                <!-- Page Heading -->
                {{-- <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header> --}}

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

                @include('inc.footer')
            
            </div>
        </div>
    </body>
</html>
