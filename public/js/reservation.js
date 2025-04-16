let startDateInput = document.getElementById("startDate");
let endDateInput = document.getElementById("endDate");
let pricePerDay = document.getElementById("priceDay").value;
let totalPriceElement = document.querySelector(".totalPrice");

function calculerPrixTotal() {
    let start = new Date(startDateInput.value);
    let end = new Date(endDateInput.value);

    if (start && end && end > start) {
        let diffTemps = end - start;
        let diffJour = diffTemps / (1000 * 60 * 60 * 24);
        let prixTotal = diffJour * pricePerDay;

        console.log(pricePerDay * diffJour)
        totalPriceElement.innerHTML = `Total Price : ${prixTotal}$`;
    } else {
        totalPriceElement.innerHTML = `Total Price : 0$`;
    }
}

startDateInput.addEventListener("change", calculerPrixTotal);
endDateInput.addEventListener("change", calculerPrixTotal);
