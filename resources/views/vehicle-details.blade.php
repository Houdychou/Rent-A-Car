<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Details - {{ $specificVehicule->brand . $specificVehicule->model }}">
    <title>Details - {{ $specificVehicule->brand . " " . $specificVehicule->model }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/vehicle-details.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
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
                    <li><a href="/vehicules" class="vehicles">Vehicles</a></li>
                    <li><a href="#" class="details">Details</a></li>
                    <li><a href="#" class="about">About us</a></li>
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
        <div class="details-car">
            <div class="left-part">
                <h1>{{ Str::title($specificVehicule->brand) . " " . $specificVehicule->model }}</h1>
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
                <h2>Technical Specification</h2>
                <div class="specs-content">
                    <div class="specifications">
                        <h3>Gear Box</h3>
                        <span>{{ Str::title($specificVehicule->transmission) }}</span>
                    </div>
                    <div class="specifications">
                        <h3>Energy Type</h3>
                        <span>{{ Str::title($specificVehicule->fuel_type) }}</span>
                    </div>
                    <div class="specifications">
                        <h3>Type</h3>
                        <span>{{ Str::title($specificVehicule->name) }}</span>
                    </div>
                    <div class="specifications">
                        <h3>Doors</h3>
                        <span>{{ Str::title($specificVehicule->doors) }}</span>
                    </div>
                    <div class="specifications">
                        <h3>Air Conditionner</h3>
                        <span>{{ Str::title($specificVehicule->doors) }}</span>
                    </div>
                    <div class="specifications">
                        <h3>Seats</h3>
                        <span>{{ Str::title($specificVehicule->seats) }}</span>
                    </div>
                </div>
                <a href="/vehicules/{{ $specificVehicule->id }}/reservation" class="details-btn rent">Rent this car</a>

                <div class="car-equipment">
                    <h4>Car equipment</h4>
                    <div class="equipment-container">
                        @foreach($equipments as $equipment)
                            <div class="equipment">
                                <img src="{{ asset("images/icons/equipement-icon.svg") }}" alt="equipment icon">
                                <span>{{ $equipment->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="cars">
            <div class="cars-top">
                <h2>Other Cars</h2>
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
