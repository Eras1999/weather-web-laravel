<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $cities = ['Colombo', 'Kandy', 'Galle', 'Jaffna', 'Matara']; // Add more cities as needed
        return view('weather.index', compact('cities'));
    }

    public function fetchWeather(Request $request)
    {
        $city = $request->city;
        $apiKey = env('WEATHER_API_KEY');
        $currentWeatherUrl = env('WEATHER_API_URL') . "?q={$city}&appid={$apiKey}&units=metric";
        $forecastUrl = env('WEATHER_API_URL') . "/forecast?q={$city}&appid={$apiKey}&units=metric";

        // Fetch current weather
        $currentWeather = Http::get($currentWeatherUrl)->json();

        // Fetch forecast data (5 days)
        $forecastData = Http::get($forecastUrl)->json();

        if ($currentWeather['cod'] != 200) {
            return redirect()->route('weather.index')->with('error', 'City not found!');
        }

        // Check if forecast data is available and contains the "list" key
        $forecastList = isset($forecastData['list']) ? $forecastData['list'] : [];

        return view('weather.result', [
            'city' => $city,
            'currentWeather' => $currentWeather,
            'forecastData' => $forecastList
        ]);
    }
}