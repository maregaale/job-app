<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <title>Olisails | job-app</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background: rgb(255,255,255);
                background: radial-gradient(circle, #cccccc 0%, rgba(47,79,79,1) 100%);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                position: relative;
                z-index: 2;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                z-index: 5;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                top: 70%;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                display: inline-block;
                border-radius: 4px;
                margin: 0 30px;
                background-color: rgba(255, 255, 255, 0.5);
                color: #000;
                padding: 20px 25px;
                font-size: 13px;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                transition: background-color .3s, color .3s;
                min-width: 75px;
                text-align: center;
            }

            .links > a:hover {
                background-color: rgba(0, 0, 0, 0.5);
                color: #fff;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            img {
                width: 600px;
                
            }

            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: url('{{asset('img/ANEMOS_1_BORLENGHI.png')}}');
                background-position: center;
                background-size: cover;
                opacity: 0.15;
                z-index: 1;
            }
        </style>
    </head>
    <body>
        <div class="overlay"></div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            
            {{-- logo veleria --}}
            <div>
                <img src="{{asset('img/OS_LOGO_WEB-1-e1548709972710.png')}}" alt="">
            </div>
            {{-- /logo veleria --}}
            
        </div>
    </body>
</html>
