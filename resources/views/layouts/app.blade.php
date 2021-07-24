<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="apple-touch-icon" sizes="57x57" href= "{{asset('apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href= "{{asset('apple -icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href= "{{asset('apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href= "{{asset('apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href= "{{asset('apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href= "{{asset('apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href= "{{asset('apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href= "{{asset('apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href= "{{asset('apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href= "{{asset('android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href= "{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href = "{{asset('favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href = "{{asset('favicon-16x16. png')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('pageTitle')</title>

    <!-- Scripts -->
    {{-- Vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    

    <!-- Styles -->
    @yield('style')
</head>
<body>
    <div id="app">
        
        @yield('overlay')
        
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="logo_header">
                        <img src="{{asset('img/OS_LOGO_WEB-1-e1548709972710.png')}}" alt="">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Script -->
    @yield('script')
</body>
</html>
