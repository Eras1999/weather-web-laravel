<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $cities = ['Colombo', 'Kandy', 'Galle', 'Jaffna', 'Matara', 'Negombo']; // List of Sri Lankan cities
        return view('weather.index', compact('cities'));
    }

    public function fetchWeather(Request $request)
    {
        $city = $request->input('city');
        $apiKey = env('WEATHER_API_KEY');
        $url = env('WEATHER_API_URL') . "?q={$city}&appid={$apiKey}&units=metric";

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            return view('weather.result', compact('city', 'data'));
        } else {
            return back()->with('error', 'Unable to fetch weather data.');
        }
    }
}

