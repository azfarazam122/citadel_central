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
    @php
        $masterAdminData = App\Models\MasterSetting::all();
        $superAdminData = App\Models\SuperSetting::all();
        $colorApplyOnAllPages;
        if ($masterAdminData[0]->is_super_brandnig_on == 'false') {
            $colorApplyOnAllPages = $masterAdminData;
        } else {
            $colorApplyOnAllPages = $superAdminData;
        }
    @endphp
    <style>
        :root {
            --primary-color: <?php echo $colorApplyOnAllPages[0]->primary_color; ?>;
            --secondary-color: <?php echo $colorApplyOnAllPages[0]->secondary_color; ?>;
            --tertiary-color: <?php echo $colorApplyOnAllPages[0]->tertiary_color; ?>;
            --primary-text-color: <?php echo $colorApplyOnAllPages[0]->primary_text_color; ?>;
            --secondary-text-color: <?php echo $colorApplyOnAllPages[0]->secondary_text_color; ?>;
            --tertiary-text-color: <?php echo $colorApplyOnAllPages[0]->tertiary_text_color; ?>;
            --fourth-text-color: <?php echo $colorApplyOnAllPages[0]->fourth_text_color; ?>;
            --lightTextColor: #707b89;
            --white-color: #fff;

        }

        .primaryTextColor {
            color: var(--primary-text-color) !important;
        }

        .secondaryTextColor {
            color: var(--secondary-text-color) !important;
        }

        .tertiaryTextColor {
            color: var(--tertiary-text-color) !important;
        }

        .fourthTextColor {
            color: var(--fourth-text-color) !important;
        }



        .homeButtons {
            color: var(--secondary-text-color);
            font-size: 18px;
            padding: 17px;
            background: var(--primary-color);
        }

        .homeButtons:hover {
            background: var(--secondary-color) !important;
            color: var(--fourth-text-color) !important;
        }

        .customButtonWithLinks:hover {
            transition: transform 0.3s;
            transform: scale(1.1);
        }

        ::-webkit-scrollbar {
            width: 15px;
        }


        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(200, 200, 200, 1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: var(--tertiary-color);
            -webkit-box-shadow: inset 0 0 6px rgba(90, 90, 90, 0.7);
        }
    </style>

    @yield('libraries')

</head>


<body>
    {{-- <h1>{{$adminData[0]->primary_color}}</h1> --}}
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
                                @php
                                    $url = $_SERVER['REQUEST_URI'];
                                    $emailFound = 'false';
                                    if (strpos($url, '@')) {
                                        $emailFound = 'true';
                                        $userEmail = explode('/', $url);
                                        $userEmail = $userEmail[count($userEmail) - 1];
                                    }
                                @endphp

                                @if ($emailFound == 'true')
                                    <li class="nav-item">
                                        <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                            href="/agent/home/{{ $userEmail }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                            href="/agent/about/{{ $userEmail }}">{{ __('About') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                            href="/agent/rates/{{ $userEmail }}">{{ __('Rates') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                            href="/agent/home/">{{ __('Home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                            href="/agent/about/">{{ __('About') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                            href="/agent/rates/">{{ __('Rates') }}</a>
                                    </li>
                                @endif
                                {{-- <li class="nav-item">
                                    <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                        href="/agent/home/">{{ __('Home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                        href="/agent/about/">{{ __('About') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: var(--primary-text-color);" target="blank" class="nav-link"
                                        href="/agent/rates/">{{ __('Rates') }}</a>
                                </li> --}}
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto " style="font-size: 20px">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a style="color: var(--primary-text-color);" class="nav-link"
                                                href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a style="color: var(--primary-text-color);" class="nav-link"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a style="color: var(--primary-text-color);" id="navbarDropdown"
                                            class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

                <main class="mt-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>



    @yield('scripts')
</body>

</html>
