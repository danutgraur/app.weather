<?php

namespace App\Http\Controllers;

use App\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Backend version
//        $minutes = 30;
////        $forecasts = Cache::remember('forecast', $minutes, function(){
////            $citiesList = collect(json_decode(file_get_contents(base_path('resources/citylist.json'))))->pluck('name','id')->toArray();
////            $locations = Location::all()->pluck('name')->toArray();
////            $ids = implode(",", array_keys(array_intersect($citiesList, $locations)));
////            Log::info("Not from cache");
////            $api_key = env('WEATHER_APP_KEY');
////
////            $url = "api.openweathermap.org/data/2.5/group?id=${ids}&APPID=${api_key}&units=metric";
////            Log::info($url);
////            $client = new \GuzzleHttp\Client();
////            $res = $client->get($url);
////            if($res->getStatusCode() == 200){
////                $j = $res->getBody();
////                $obj = json_decode($j);
////                $forecasts = $obj;
////            }
////            return $forecasts;
////        });
///
///         return view('welcome)
///             ->withForecasts($forecasts);


///     Front-end version
        $citiesList = collect(json_decode(file_get_contents(base_path('resources/citylist.json'))))->pluck('name','id')->toArray();
        $locations = Location::all()->pluck('name')->toArray();
        $ids = implode(",", array_keys(array_intersect($citiesList, $locations)));
        $apiKey = env('WEATHER_APP_KEY');

        return view('welcome')
            ->withIds($ids)
            ->withApiKey($apiKey);


    }
}
