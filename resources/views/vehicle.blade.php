<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Vehicles - Rent A Car">
    <title>Vehicles - Rent A Car</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/vehicle.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
</head>

<body>
<div class="container">
    @include('components.header')
    <main>
        <div class="select-content">
            <h1>Select a vehicle group</h1>

            <div class="type-vehicle content-vehicle">
                <a class="vehicle-type purple" href="/vehicules">All Vehicles</a>
                <hr>
                @foreach($typeVehicules as $type)
                    <a class="custom-link"
                       href="/vehicules/type/{{ urlencode($type->name) }}">{{ Str::title($type->name) }}</a>
                @endforeach
            </div>

            <div class="fuel-vehicle content-vehicle">
                <a class="energy-type purple" href="/vehicules">All Energy Type</a>
                <hr>
                @foreach($fuelTypes as $fuel)
                    <a class="custom-link"
                       href="/vehicules/energy/{{ urlencode($fuel->fuel_type) }}">{{ Str::title($fuel->fuel_type) }}</a>
                @endforeach
            </div>

            <div class="gear-vehicle content-vehicle">
                <a class="gear-type purple" href="/vehicules">All Type Of Gear</a>
                <hr>
                @foreach($gearType as $gear)
                    <a class="custom-link"
                       href="/vehicules/gear/{{ urlencode($gear->transmission) }}">{{ Str::title($gear->transmission) }}</a>
                @endforeach
            </div>
        </div>

        <form action="">
            <h2>Or choose your budget</h2>
            <small class="range-note">Only vehicles costing <strong>less than or equal</strong> to this amount will be shown.</small>
            <div class="range-wrapper">
                <div class="range-labels">
                    <span>$0</span>
                    <span class="current-value filter-price"><span id="range-value">$0</span></span>
                    <span>$150</span>
                </div>
                <input type="range" min="0" max="150" name="price" id="price" value="0">
            </div>
        </form>

        <div class="reset-btn-wrapper">
            <a href="/vehicules" class="reset-btn">Reset Filters</a>
        </div>

        <div class="cars">
            @if(isset($noResult) && $noResult)
                <div class="no-results">Aucun véhicule ne correspond à vos critères.</div>
            @endif

            <div class="errorDiv"></div>

            <div class="grid-cars" id="vehicle-list">
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
        <div class="brands">
            <img src="{{ asset("images/logo/toyota.png") }}" alt="toyota">
            <img src="{{ asset("images/logo/ford.png") }}" alt="ford">
            <img src="{{ asset("images/logo/mercedes.png") }}" alt="mercedes">
            <img src="{{ asset("images/logo/jeep.png") }}" alt="jeep">
            <img src="{{ asset("images/logo/bmw.png") }}" alt="bmw">
            <img src="{{ asset("images/logo/audi.png") }}" alt="audi">
        </div>
    </main>
    @include('components.footer')
</div>

<script src="{{ asset('js/vehicles.js') }}"></script>
</body>
</html>
