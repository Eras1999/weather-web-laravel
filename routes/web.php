<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/fetch-weather', [WeatherController::class, 'fetchWeather'])->name('weather.fetch');
