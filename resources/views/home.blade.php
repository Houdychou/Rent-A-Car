<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Home">
    <title>Home - Rent A Car</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
</head>

<body>
<div class="container">
    @include('components.header')
    <main>
        <div class="hero">
            <div class="hero-content">
                <div class="hero-left">
                    <h1 class="hero-title">Experience the road like never before</h1>
                    <p class="hero-text">Rent a car in just a few taps. Fast, flexible, and affordable, your next ride
                        is always ready,
                        wherever and whenever you need it.</p>
                    <a class="all-cars btn-orange" href="/vehicules">View all cars</a>
                </div>
                <form action="/vehicules" method="GET">
                    <div class="form-content">
                        <h2>Book your car</h2>
                        <div class="select-part">
                            <select class="custom-select" name="type" id="type-vehicle">
                                <option value="" disabled {{ request('type') ? '' : 'selected' }}>Vehicle Type</option>
                                @foreach($typeVehicules as $type)
                                    <option value="{{ $type->name }}" {{ request('type') == $type->name ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>

                            <select class="custom-select" name="energy" id="energy-vehicle">
                                <option value="" disabled {{ request('energy') ? '' : 'selected' }}>Energy Type</option>
                                @foreach($fuelTypes as $fuel)
                                    <option value="{{ $fuel->fuel_type }}" {{ request('energy') == $fuel->fuel_type ? 'selected' : '' }}>
                                        {{ $fuel->fuel_type }}
                                    </option>
                                @endforeach
                            </select>

                            <select class="custom-select" name="gear" id="gear-vehicle">
                                <option value="" disabled {{ request('gear') ? '' : 'selected' }}>Type Of Gear</option>
                                @foreach($gearType as $gear)
                                    <option value="{{ $gear->transmission }}" {{ request('gear') == $gear->transmission ? 'selected' : '' }}>
                                        {{ $gear->transmission }}
                                    </option>
                                @endforeach
                            </select>

                            <select class="custom-select" name="year" id="year-vehicle">
                                <option value="" disabled {{ request('year') ? '' : 'selected' }}>Year</option>
                                @foreach($years as $year)
                                    <option value="{{ $year->year }}" {{ request('year') == $year->year ? 'selected' : '' }}>
                                        {{ $year->year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn-orange submit-form" value="Book Now">
                    </div>
                </form>
            </div>
            <img src="{{ asset('images/blur-bmw-main.png') }}" alt="bmw blur image">
        </div>

        <div class="advantages">
            <div class="card availability">
                <img src="{{ asset('images/icons/location-icon.svg') }}" alt="location icon">
                <h2>Availability</h2>
                <p>A wide range of vehicles, available anytime, <br> wherever you need them.</p>
            </div>
            <div class="card comfort">
                <img src="{{ asset('images/icons/car-comfort-icon.svg') }}" alt="comfort icon">
                <h2>Comfort</h2>
                <p>Enjoy a smooth, relaxing drive with clean, <br> modern, well-equipped cars.
                </p>
            </div>
            <div class="card savings">
                <img src="{{ asset('images/icons/wallet-icon.svg') }}" alt="wallet icon">
                <h2>Savings</h2>
                <p>Smart prices, no hidden fees — only pay when <br> you actually drive.</p>
            </div>
        </div>

        <div class="cars">
            <div class="cars-top">
                <h2>Choose the car that <br> suits you</h2>
                <a class="link-cars" href="/vehicules">View All <i class="ri-arrow-right-line"></i></a>
            </div>
            <div class="grid-cars">
                @foreach($vehicules as $vehicule)
                    <div class="card-cars">
                        <img src="{{ asset($vehicule->image_url) }}"
                             class="vehicle-img"
                             alt="{{ $vehicule->brand . " " . $vehicule->model }}">
                        <div class="container-cars">
                            <div class="top-content">
                                <div class="content-cars">
                                    <h3>{{ $vehicule->brand . " " . $vehicule->model }}</h3>
                                    <span class="grey-span">{{ Str::title($vehicule->name) }}</span>
                                </div>
                                <div class="content-cars">
                                    <span class="price">${{ $vehicule->price_per_day }}</span>
                                    <span class="grey-span">per day</span>
                                </div>
                            </div>
                            <div class="vehicle-details">
                                <div class="details">
                                    <img src="{{ asset('images/icons/transmission-icon.svg') }}" class="icons"
                                         alt="type of transmission image">
                                    <span class="grey-span">{{ Str::title($vehicule->transmission) }}</span>
                                </div>
                                <div class="details">
                                    <img src="{{ asset('images/icons/fuel-icon.svg') }}" class="icons" alt="fuel image">
                                    <span class="grey-span">{{ Str::title($vehicule->fuel_type) }}</span>
                                </div>
                                <div class="details">
                                    <img src="{{ asset('images/icons/air-conditionner.svg') }}" class="icons"
                                         alt="conditionner image">
                                    @if($vehicule->air_conditioning === 1)
                                        <span class="grey-span">Air Conditioner</span>
                                    @else
                                        <span class="grey-span">None</span>
                                    @endif
                                </div>
                            </div>
                            <a href="/vehicules/{{ $vehicule->id }}" class="details-btn">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    @include('components.footer');
</div>
</body>
</html>
