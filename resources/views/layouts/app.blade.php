<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-700">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
                <div class="p-0 sm:p-1">
                    <div class="max-w-7xl">
                    @include('layouts.partials.language')
                    </div>   
                </div>
            </div>

        
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8  ">
                <div class="p-0 sm:p-1 bg-gray-900 shadow rounded-lg">
                    <div class="max-w-7xl">
                        @include('layouts.navigation')
                    </div>   
                </div>
            </div>
         
            <!-- Page Heading -->
            @if (isset($header))
                <header>
                    <div class="max-w-7xl mx-auto pt-6 px-4 sm:px-6 lg:px-8  ">
                        <div class="p-4 sm:p-8 bg-gray-900 shadow sm:rounded-lg">
                            <div class="max-w-7xl">
                                {{ $header }}
                            </div>   
                        </div>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <!--div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 p-6">
                    <div class="bg-gray-900 shadow sm:rounded-lg"-->
                            {{ $slot }}
                        
                    <!--/div>
                </div-->
            </main>
        </div>
    </body>
</html>
