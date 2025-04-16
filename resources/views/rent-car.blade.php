<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description"
          content="Rent - {{ Str::upper($specificVehicule->brand) . " " . Str::title($specificVehicule->model) }}">
    <title>Rent - {{ Str::title($specificVehicule->brand) . " " . Str::title($specificVehicule->model) }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/rent-car.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
<div class="container">
    @include('components.header')

    <main>
        @if (session('message'))
            <div class="custom-alert">
                {{ session('message') }}
            </div>
        @endif

        <h1>Reservation</h1>
        <div class="rent-car">
            <div class="left-part">
                <h2>{{ Str::Title($specificVehicule->brand) . " " . $specificVehicule->model }}</h2>
                <p><span class="price">${{ $specificVehicule->price_per_day }}</span>
                    <span class="grey-span">/ day</span></p>
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
                <form method="POST">
                    @csrf
                    <div class="form-content">
                        <label for="startDate">Start date</label>
                        <input type="text" id="startDate" name="startDate" placeholder="Select a start date"
                               value="{{ old("startDate") }}">
                        @error("startDate")
                        <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-content">
                        <label for="endDate">End date</label>
                        <input type="text" id="endDate" name="endDate" placeholder="Select a return date"
                               value="{{ old("endDate") }}">
                        @error("endDate")
                        <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-content">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Email" value="{{ old("email") }}">
                        @error("email")
                        <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="hidden" name="priceDay" id="priceDay" value="{{ $specificVehicule->price_per_day }}">

                    <div class="checkbox-wrapper">
                        <img src="{{ asset("images/icons/equipement-icon.svg") }}" alt="check icon">
                        <p class="totalPrice">Total price : 0$</p>
                    </div>

                    <button type="submit">Book Now</button>
                </form>
            </div>
        </div>

        <div class="hero">
            <div class="hero-content">
                <div class="hero-left">
                    <h2 class="hero-title">Looking for a car?</h2>
                    <h2 class="phone">+537 547-6401</h2>
                    <p class="hero-text">Call to this number to receive an incredibly amount of beautiful cars for
                        free!</p>
                    <a class="all-cars btn-orange" href="/vehicules">Book Now</a>
                </div>
                <div class="hero-right">
                    <img src="{{ asset('images/blur-bmw-main.png') }}" alt="bmw blur image">
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    const reservedRanges = @json($reservedDates);
    const disabledDates = [];

    reservedRanges.forEach(range => {
        let start = new Date(range.start_date);
        const end = new Date(range.end_date);

        while (start <= end) {
            disabledDates.push(start.toISOString().split('T')[0]);
            start.setDate(start.getDate() + 1);
        }
    });

    flatpickr("#startDate", {
        dateFormat: "Y-m-d",
        disable: disabledDates,
        minDate: "today"
    });

    flatpickr("#endDate", {
        dateFormat: "Y-m-d",
        disable: disabledDates,
        minDate: "today"
    });
</script>

<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/reservation.js') }}"></script>
</body>
</html>
