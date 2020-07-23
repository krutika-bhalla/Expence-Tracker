<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Expense Keeper</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 60px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
{{--    <div class="flex-center">--}}
{{--        <h1 class="display-4">K J Somaiya Institute of Engineering and Information Technology</h1>--}}
{{--    </div>--}}
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content w-95">
                <div class="title m-b-md">
                    Expense Keeper
                </div>
        {{--        <p>--}}
        {{--            A project to display Zones over India using Data published by Govt. of India.--}}
        {{--        </p>--}}
        {{--        <p>--}}
        {{--            <a href="{{route('map')}}" style="color:blue;">Click here to view Choropleth Map</a>--}}
        {{--        </p>--}}
                {{--                <a href="{{asset('assets/data/data.csv')}}">Click here to download CSV data</a>--}}
                <p class="footer">
                            <span>
                                Created by
                                <a class="link1" href="https://github.com/krutika-bhalla"> Krutika Bhalla</a> &
                                <a class="link2" href="https://github.com/DhairyaMehta2000"> Dhairya Mehta</a>
                            </span>
                </p>

                <style>
                    .footer {
                        color: #636b6f;
                        width: 100%;
                        /*position: fixed;*/
                        bottom: 0;
                        text-align: center;
                    }
                    .link1 {
                        color: #636b6f;
                    }
                    .link2 {
                        color: #636b6f;
                    }
                </style>
            </div>
        </div>
    </body>
</html>
