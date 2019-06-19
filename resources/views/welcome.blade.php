<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
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
                font-size: 84px;
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

            <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card-deck">
                                @foreach($forecasts->list as $forecast)
                                    <div class="card">
                                        <div class="card-body">
                                            <b>{{ \Carbon\Carbon::parse($forecast->dt)->format('j.m.Y') }}</b>
                                            <br>
                                            <b>{{ $forecast->name }}, {{ $forecast->sys->country }}</b>
                                            <br>
                                            <small class="text-muted">(Lat {{ $forecast->coord->lat }} / Lon {{ $forecast->coord->lon }}</small>)
                                            <br>
                                            @foreach($forecast->weather as $weather)
                                                Weather forecast: {{ $weather->main }} <img src="http://openweathermap.org/img/w/{{$weather->icon}}.png">
                                            @endforeach
                                            <br>
                                            Temperature {{ $forecast->main->temp_min }} &#8451;
                                            <br>
                                            <small>Min temperature {{ $forecast->main->temp_min }} &#8451;</small>
                                            <br>
                                            <small>Max temperature: {{ $forecast->main->temp_max }} &#8451;</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>
