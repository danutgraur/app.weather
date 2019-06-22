@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary m-3" id="updateData">Update info</button>
            </div>
            <div class="col-12">
                <div class="card-deck" id="citiesWrapper">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function(){

            function getData(){
                $("#citiesWrapper").empty();
                $.getJSON("http://api.openweathermap.org/data/2.5/group?id=<?php echo $ids ?>&APPID=<?php echo $apiKey ?>&units=metric", function(resp){

                    $.each(resp.list, function(key, value){
                        let dt = new Date(value.dt * 1000).toLocaleDateString('ro-RO');
                        $("#citiesWrapper").append(
                            `<div class='col-3 mb-4'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5>${dt}</h5>
                                        <h4 class='mb-0'><b>${value.name} , ${value.sys.country}</b></h4>
                                        <small class='text-muted'>(Lat ${value.coord.lat} / Lon ${value.coord.lon} )</small></br>
                                        <h5 class='forecast'><b>${value.weather[0].main}</b> <img src='http://openweathermap.org/img/w/${value.weather[0].icon}.png'></h5>
                                        <h5>Temperature: ${Math.floor(value.main.temp)} &#8451;</h5>
                                        <p class="card-text m-0"><small class="text-muted">Min ${Math.floor(value.main.temp_min)} &#8451;</small></p>
                                        <p class="card-text m-0"><small class="text-muted">Max ${Math.floor(value.main.temp_max)} &#8451;</small></p>
                                    </div>
                                </div>
                            </div>`
                        ).css("opacity", "1");
                    });
                });
            }
            getData();

            setInterval(getData, 1800000);
            $("#updateData").click(getData);

        });
    </script>
@endsection


{{--    Backend version--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="card-deck" id="citiesWrapper">--}}
{{--                    @foreach($forecasts->list as $forecast)--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <b>{{ \Carbon\Carbon::parse($forecast->dt)->format('j.m.Y') }}</b>--}}
{{--                                <br>--}}
{{--                                <b>{{ $forecast->name }}, {{ $forecast->sys->country }}</b>--}}
{{--                                <br>--}}
{{--                                <small class="text-muted">(Lat {{ $forecast->coord->lat }} / Lon {{ $forecast->coord->lon }}</small>)--}}
{{--                                <br>--}}
{{--                                @foreach($forecast->weather as $weather)--}}
{{--                                    Weather forecast: {{ $weather->main }} <img src="http://openweathermap.org/img/w/{{$weather->icon}}.png">--}}
{{--                                @endforeach--}}
{{--                                <br>--}}
{{--                                Temperature {{ $forecast->main->temp_min }} &#8451;--}}
{{--                                <br>--}}
{{--                                <small>Min temperature {{ $forecast->main->temp_min }} &#8451;</small>--}}
{{--                                <br>--}}
{{--                                <small>Max temperature: {{ $forecast->main->temp_max }} &#8451;</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
