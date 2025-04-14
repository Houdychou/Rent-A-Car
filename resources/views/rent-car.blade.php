<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Réserver - {{ Str::upper($specificVehicule->brand) . " " . Str::title($specificVehicule->model) }}">
    <title>Réserver - {{ Str::title($specificVehicule->brand) . " " . Str::title($specificVehicule->model) }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/rent-car.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <header>
        <div class="header-container">
            <div class="car-rental">
                <img src="{{ asset('images/icons/car-logo.svg') }}" alt="car logo">
                <p>Car Rental</p>
            </div>
            <nav>
                <ul>
                    <li><a href="/" class="home">Home</a></li>
                    <li><a href="/vehicules" class="vehicules">Vehicles</a></li>
                    <li><a href="#" class="details">Details</a></li>
                    <li><a href="/about" class="about">About us</a></li>
                </ul>
            </nav>
            <div class="help">
                <img src="{{ asset('images/icons/phone-icon.svg') }}" alt="phone image">
                <div class="help-content">
                    <p class="need-help">Need help?</p>
                    <p class="phone-number">+996 247-1680</p>
                </div>
            </div>
        </div>
    </header>

    <main>
        <h1>Reservation</h1>
        <div class="rent-car">
            <div class="left-part">
                <h2>{{ Str::upper($specificVehicule->brand) . " " . $specificVehicule->model }}</h2>
                <p><span class="price">${{ $specificVehicule->price_per_day }}</span> <span
                        class="grey-span">/ day</span></p>
                <img class="mainImg" src="{{ asset($specificVehicule->image_url) }}"
                     alt="{{ $specificVehicule->brand . " " . $specificVehicule->model }}">
                <div class="carousel">
                    @foreach($carousel as $img)
                        <div class="carousel-img">
                            <img src="{{ asset($img->image_url) }}" alt="{{ $img->display_order }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="right-part">

            </div>
        </div>

        <div class="hero">
            <div class="hero-content">
                <div class="hero-left">
                    <h2 class="hero-title">Looking for a car?</h2>
                    <h2 class="phone">+537 547-6401</h2>
                    <p class="hero-text">Call to this number to receive an incredibly amount of beautiful cars for free!</p>
                    <a class="all-cars btn-orange" href="/vehicules">Book Now</a>
                </div>
                <div class="hero-right">
                    <img src="{{ asset('images/blur-bmw-main.png') }}" alt="bmw blur image">
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="car-rental">
                <img src="{{ asset('images/icons/car-logo.svg') }}" alt="car logo">
                <p>Car Rental</p>
            </div>
            <div class="address card-footer">
                <img src="{{ asset('images/icons/location-footer.svg') }}" alt="location image">
                <div class="content">
                    <p>Address</p>
                    <p class="bold-text">Oxford Ave. Cary, NC 27511</p>
                </div>
            </div>
            <div class="email card-footer">
                <img src="{{ asset('images/icons/email-footer.svg') }}" alt="email image">
                <div class="content">
                    <p>Email</p>
                    <p class="bold-text">nwiger@yahoo.com</p>
                </div>
            </div>
            <div class="phone card-footer">
                <img src="{{ asset('images/icons/phone-footer.svg') }}" alt="phone image">
                <div class="content">
                    <p>Phone</p>
                    <p class="bold-text">+537 547-6401</p>
                </div>
            </div>
        </div>
        <p class="copy">&copy; Copyright Car Rental 2024. Made by Houdeyfa</p>
    </footer>
</div>

<script src="{{ asset('js/carousel.js') }}"></script>
</body>
</html>
