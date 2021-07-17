<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
                
                border-radius: 4px;
                margin: 10px;
                background-color: rgba(255, 255, 255, 0.5);
                color: #000;
                padding: 20px 25px;
                font-size: 13px;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                transition: background-color color .3s;
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
                background-image: url('../public/img/ANEMOS_1_BORLENGHI.png');
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
                        <a href="{{ url('/home') }}">Home</a>
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
                <img src="../public/img/OS_LOGO_WEB-1-e1548709972710.png" alt="">
            </div>
            {{-- /logo veleria --}}
            
        </div>
    </body>
</html>
