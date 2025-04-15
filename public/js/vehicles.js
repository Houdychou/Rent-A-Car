document.addEventListener("DOMContentLoaded", function () {

    const links = document.querySelectorAll("a.custom-link");
    const range = document.querySelector("#price");
    const filterPriceP = document.querySelector(".filter-price");
    const divError = document.querySelector(".errorDiv");

    range.addEventListener("input", function (e) {
        filterPriceP.textContent = range.value + "$";
    })

    range.addEventListener("change", function () {
        const url = `/vehicules/price/${range.value}`;
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(vehicules => {
                const container = document.getElementById('vehicle-list');
                container.innerHTML = '';

                if (vehicules.length === 0) {
                    divError.classList.add("no-results");
                    divError.innerHTML = `<p>No vehicles match your criteria.</p>`
                    return;
                }

                divError.innerHTML = ``;
                divError.classList.remove("no-results");

                vehicules.forEach(v => {
                    const card = `
                    <div class="card-cars">
                        <img src="${v.image_url}" class="vehicle-img" alt="${v.brand} ${v.model}">
                        <div class="container-cars">
                            <div class="top-content">
                                <div class="content-cars">
                                    <h3>${v.brand} ${v.model}</h3>
                                    <span class="grey-span">${capitalizeFirstLetter(v.name)}</span>
                                </div>
                                <div class="content-cars">
                                    <span class="price">$${v.price_per_day}</span>
                                    <span class="grey-span">per day</span>
                                </div>
                            </div>
                            <div class="vehicle-details">
                                <div class="details">
                                    <img src="/images/icons/transmission-icon.svg" class="icons" alt="Transmission">
                                    <span class="grey-span">${capitalizeFirstLetter(v.transmission)}</span>
                                </div>
                                <div class="details">
                                    <img src="/images/icons/fuel-icon.svg" class="icons" alt="Fuel">
                                    <span class="grey-span">${capitalizeFirstLetter(v.fuel_type)}</span>
                                </div>
                                <div class="details">
                                    <img src="/images/icons/air-conditionner.svg" class="icons" alt="AC">
                                    <span class="grey-span">${v.air_conditioning ? 1 : "Air Conditioner"}</span>
                                </div>
                            </div>
                            <a href="/vehicules/${v.id}" class="details-btn">View Details</a>
                        </div>
                    </div>
                `;
                    container.innerHTML += card;
                });
            })
            .catch(error => console.error("Erreur AJAX :", error));
    });

    links.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const url = link.getAttribute("href");

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(vehicules => {
                    const container = document.getElementById('vehicle-list');

                    divError.innerHTML = ``;
                    divError.classList.remove("no-results");
                    container.innerHTML = '';

                    vehicules.forEach(v => {
                        const card = `
                                <div class="card-cars">
                                    <img src="${v.image_url}" class="vehicle-img" alt="${v.brand} ${v.model}">
                                    <div class="container-cars">
                                        <div class="top-content">
                                            <div class="content-cars">
                                                <h3>${v.brand} ${v.model}</h3>
                                                <span class="grey-span">${capitalizeFirstLetter(v.name)}</span>
                                            </div>
                                            <div class="content-cars">
                                                <span class="price">$${v.price_per_day}</span>
                                                <span class="grey-span">per day</span>
                                            </div>
                                        </div>
                                        <div class="vehicle-details">
                                            <div class="details">
                                                <img src="/images/icons/transmission-icon.svg" class="icons" alt="Transmission">
                                                <span class="grey-span">${capitalizeFirstLetter(v.transmission)}</span>
                                            </div>
                                            <div class="details">
                                                <img src="/images/icons/fuel-icon.svg" class="icons" alt="Fuel">
                                                <span class="grey-span">${capitalizeFirstLetter(v.fuel_type)}</span>
                                            </div>
                                            <div class="details">
                                                <img src="/images/icons/air-conditionner.svg" class="icons" alt="AC">
                                                <span class="grey-span">${v.air_conditioning ? "not defined" : "Air Conditioner"}</span>
                                            </div>
                                        </div>
                                        <a href="/vehicules/${v.id}" class="details-btn">View Details</a>
                                    </div>
                                </div>
                            `;
                        container.innerHTML += card;
                    });
                })
                .catch(error => console.error("Erreur AJAX :", error));
        });
    });
});

function capitalizeFirstLetter(val) {
    return String(val).charAt(0).toUpperCase() + String(val).slice(1);
}
