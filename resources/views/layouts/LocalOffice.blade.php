<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LogiFreight Limited</title>
    <link rel="icon" href="/image/logo1.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body class="h-screen font-sans antialiased leading-none bg-blue-800">
    <div id="app">
            <div class="container flex items-center justify-between px-6 mx-auto">
                <div>
                </div>
                <nav class="space-x-4 text-sm text-gray-300 sm:text-base">

                </nav>
            </div>
        </header>

{{--        start--}}
        <div class="flex min-h-screen">
            <div class="w-1/4 px-10 py-12">
                <div class="flex items-center pb-4 border-b-2 space-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-indigo-900 h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-3xl font-bold text-orange-500">LOGIFREIGHT LTD</h1>
                    </div>
                </div>
                <div class="flex items-center p-2 mt-6 space-x-4 bg-indigo-900 rounded-md">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                        </svg>
                    </div>
                    <div>
                      <a href="{{route('Localhome')}}"><p class="text-lg font-semibold text-white">Dashboard</p></a>
                    </div>
                </div>
                <div class="mt-8">
                    <ul class="space-y-10">
                      <li>
                        <p class="flex items-center text-sm font-semibold text-gray-500 transition duration-200 hover:text-indigo-600" hover:text-indigo-600>
                         Package</p>
                    </li>
                    <li>
                        <li>
                            <a href="{{route('pickup')}}" class="flex items-center text-sm font-semibold text-gray-500 transition duration-200 hover:text-indigo-600" hover:text-indigo-600>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-4 text-gray-400 transition duration-200 hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Pick Up Packages</a
                            >
                        </li>
                        <li>
                            <a href="{{route('qa')}}" class="flex items-center text-sm font-semibold text-gray-500 transition duration-200 hover:text-indigo-600" hover:text-indigo-600>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-4 text-gray-400 transition duration-200 hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                QuickAlerts</a
                            >
                        </li>
                        <li>
                            <a href="{{route('list')}}" class="flex items-center text-sm font-semibold text-gray-500 transition duration-200 hover:text-indigo-600" hover:text-indigo-600>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-4 text-gray-400 transition duration-200 hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                List of Expected Packages</a
                            >
                        </li>
                        <li>
                            <p class="flex items-center text-sm font-semibold text-gray-500 transition duration-200 hover:text-indigo-600" hover:text-indigo-600>
                             Invoice</p>
                        </li>
                        <li>
                            <a href="{{route('invoice')}}" class="flex items-center text-sm font-semibold text-gray-500 transition duration-200 hover:text-indigo-600" hover:text-indigo-600>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-4 text-gray-400 transition duration-200 hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Invoice</a>
                        </li>
                   </ul>
                </div>

                <div class="flex items-center mt-20 space-x-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400 transition duration-200 hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <a href="{{route('logout')}}"
                       class="block font-semibold text-gray-500 transition duration-200 hover:text-indigo-600">
                       Logout
                    </a>
                </div>
            </div>
            <div class="flex-grow px-10 py-12 bg-indigo-50">
        @yield('content')

                <div></div>
                <div></div>
            </div>
        </div>
{{--                end--}}
    </div>
    @livewireScripts
</body>
</html>