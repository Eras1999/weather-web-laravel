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
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-3">Weather in {{ $city }}</h1>
            <p>Here is the latest weather update for {{ $city }}.</p>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="result-card col-md-6 text-center">
                <img src="https://openweathermap.org/img/wn/{{ $data['weather'][0]['icon'] }}@2x.png" 
                     alt="Weather Icon" 
                     class="weather-icon mb-3">
                <h3>{{ ucfirst($data['weather'][0]['description']) }}</h3>
                <p>Temperature: <strong>{{ $data['main']['temp'] }}°C</strong></p>
                <p>Feels Like: <strong>{{ $data['main']['feels_like'] }}°C</strong></p>
                <p>Humidity: <strong>{{ $data['main']['humidity'] }}%</strong></p>
                <p>Wind Speed: <strong>{{ $data['wind']['speed'] }} m/s</strong></p>
                <p>Pressure: <strong>{{ $data['main']['pressure'] }} hPa</strong></p>
                <a href="{{ route('weather.index') }}" class="btn btn-primary w-100 mt-3">Back to Main Page</a>
            </div>
        </div>
    </div>
</body>
</html>
