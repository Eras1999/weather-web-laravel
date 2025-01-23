<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(120deg, #a1c4fd, #c2e9fb);
            font-family: Arial, sans-serif;
            color: #333;
        }
        .weather-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
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
            <h1 class="mb-3">Sri Lanka Weather App</h1>
            <p>Get real-time weather updates for major cities in Sri Lanka. Select a city from the list below and check the current conditions.</p>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="weather-card col-md-6">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('weather.fetch') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="city" class="form-label">Choose a City:</label>
                        <select name="city" id="city" class="form-select" required>
                            <option value="" disabled selected>Select a city</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Get Weather</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
