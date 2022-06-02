<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary-color: #dbac28;
            --secondary-color: #fffcc3;
            --lightTextColor: #707b89;
            --white-color: #fff;
        }

        .customButtonWithLinks:hover {
            transition: transform .3s;
            transform: scale(1.1);
            /* background: black;
            color: white;
            border: 1px solid white !important; */
        }

    </style>

    @yield('libraries')

</head>

<body>
    <div class="w-100 d-flex">
        <div class="">
            @yield('sidebar')
        </div>
        <div class=" w-100">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <div>
                            <img src="../../../../images/logo.png" alt="" srcset="">
                        </div>
                        {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto" style="font-size: 20px">
                                <li class="nav-item">
                                    <a style="color: #dbac28" target="blank" class="nav-link"
                                        href="/agent/home/">{{ __('Home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #dbac28" target="blank" class="nav-link"
                                        href="/agent/about/">{{ __('About') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #dbac28" target="blank" class="nav-link"
                                        href="/agent/rates/">{{ __('Rates') }}</a>
                                </li>
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto " style="font-size: 20px">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a style="color: #dbac28" class="nav-link"
                                                href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a style="color: #dbac28" class="nav-link"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a style="color: #dbac28" id="navbarDropdown" class="nav-link dropdown-toggle"
                                            href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->email }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="my-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @yield('scripts')

</body>

</html>
