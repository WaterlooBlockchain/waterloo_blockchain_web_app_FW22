<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UW Blockchain</title>
        <link rel="shortcut icon" href="{{asset('images/uw_blockchain.png')}}" type="image/x-icon"/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/814d3142a2.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/Layout.css')}}">
        <style>
            body {
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                background: linear-gradient(90deg, #180831, #30195d, #7A3ADF, #7A3ADF, #9866E6, #D3BDF4);
                background-size: 300% 300%;
                animation: gradient 60s ease infinite;
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                @include('components.header')
            </div>
            <div class="content">
                @yield('content')
            </div>
            <div class="footer">
                @include('components.footer')
            </div>
        </div>
    </body>
</html>
