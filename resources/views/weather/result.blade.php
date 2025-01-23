<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Result</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(120deg, #89f7fe, #66a6ff);
            font-family: Arial, sans-serif;
            color: #333;
        }
        .result-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }
        .weather-icon {
            width: 100px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .forecast-card {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-3">Weather in {{ $city }}</h1>
            <p>Here is the latest weather update for {{ $city }}.</p>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="result-card col-md-8 text-center">
                <!-- Current Weather -->
                <img src="https://openweathermap.org/img/wn/{{ $currentWeather['weather'][0]['icon'] }}@2x.png" 
                     alt="Weather Icon" 
                     class="weather-icon mb-3">
                <h3>{{ ucfirst($currentWeather['weather'][0]['description']) }}</h3>
                <p>Temperature: <strong>{{ $currentWeather['main']['temp'] }}°C</strong></p>
                <p>Feels Like: <strong>{{ $currentWeather['main']['feels_like'] }}°C</strong></p>
                <p>Humidity: <strong>{{ $currentWeather['main']['humidity'] }}%</strong></p>
                <p>Wind Speed: <strong>{{ $currentWeather['wind']['speed'] }} m/s</strong></p>
                <p>Pressure: <strong>{{ $currentWeather['main']['pressure'] }} hPa</strong></p>

                <!-- Forecast Weather -->
                <h3 class="mt-4">Forecast for the Next 5 Days:</h3>
                <div class="row">
                    @foreach($forecastData as $forecast)
                        <div class="col-md-2">
                            <div class="forecast-card">
                                <img src="https://openweathermap.org/img/wn/{{ $forecast['weather'][0]['icon'] }}@2x.png" 
                                     alt="Weather Icon" 
                                     class="weather-icon mb-3">
                                <h5>{{ \Carbon\Carbon::createFromTimestamp($forecast['dt'])->format('M d, h:i A') }}</h5>
                                <p>{{ ucfirst($forecast['weather'][0]['description']) }}</p>
                                <p><strong>{{ $forecast['main']['temp'] }}°C</strong></p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('weather.index') }}" class="btn btn-primary w-100 mt-4">Back to Main Page</a>
            </div>
        </div>
    </div>
</body>
</html>
