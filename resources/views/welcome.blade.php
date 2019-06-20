@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col">
                <div class="card-deck" id="citiesWrapper">
{{--                                @foreach($forecasts->list as $forecast)--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <b>{{ \Carbon\Carbon::parse($forecast->dt)->format('j.m.Y') }}</b>--}}
{{--                                            <br>--}}
{{--                                            <b>{{ $forecast->name }}, {{ $forecast->sys->country }}</b>--}}
{{--                                            <br>--}}
{{--                                            <small class="text-muted">(Lat {{ $forecast->coord->lat }} / Lon {{ $forecast->coord->lon }}</small>)--}}
{{--                                            <br>--}}
{{--                                            @foreach($forecast->weather as $weather)--}}
{{--                                                Weather forecast: {{ $weather->main }} <img src="http://openweathermap.org/img/w/{{$weather->icon}}.png">--}}
{{--                                            @endforeach--}}
{{--                                            <br>--}}
{{--                                            Temperature {{ $forecast->main->temp_min }} &#8451;--}}
{{--                                            <br>--}}
{{--                                            <small>Min temperature {{ $forecast->main->temp_min }} &#8451;</small>--}}
{{--                                            <br>--}}
{{--                                            <small>Max temperature: {{ $forecast->main->temp_max }} &#8451;</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function(){
            getData();

            function getData(){
                $("#citiesWrapper").empty();
                $.getJSON("http://api.openweathermap.org/data/2.5/group?id=<?php echo $ids ?>&APPID=<?php echo $apiKey ?>&units=metric", function(resp){
                    $.each(resp.list, function(key, value){
                        $("#citiesWrapper").append(
                            `<div class='card'>
                                <div class='card-body'>
                                    <h4 class='mb-0'>${value.name} , ${value.sys.country} </h4>
                                    <small class='text-muted'>(Lat ${value.coord.lat} / Lon ${value.coord.lon} )</small></br>
                                    <h5 class='forecast'> ${value.weather[0].main} <img src='http://openweathermap.org/img/w/${value.weather[0].icon}.png'></h5>
                                    <h5>Temperature: ${value.main.temp}</h5>
                                    Min Temperature ${value.main.temp_min}</br>
                                    Max Temperature ${value.main.temp_max}</br>
                                </div>
                            </div>`
                        );
                    });
                });
            }

            setInterval(getData, 180000);
        });
    </script>
@endsection
