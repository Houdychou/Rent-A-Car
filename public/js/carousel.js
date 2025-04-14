document.addEventListener("DOMContentLoaded", function () {
    const allCarouselImg = document.querySelectorAll(".carousel img");
    const mainImg = document.querySelector(".mainImg");
    const body = document.querySelector("body");

    body.style.overflow = "inherit";

    let zoomContainer = document.createElement("div");
    zoomContainer.className = "zoom-container";
    zoomContainer.style.display = "none";
    document.body.appendChild(zoomContainer);

    let content = document.createElement("div");
    content.className = "contentZoom";
    zoomContainer.appendChild(content)

    let zoomedImg = document.createElement("img");
    content.appendChild(zoomedImg);

    let closeImg = document.createElement("i")
    closeImg.className = "ri-close-line close";
    closeImg.style.display = "none";
    content.appendChild(closeImg)

    function closeZoom() {
        zoomContainer.style.display = "none";
    }

    allCarouselImg.forEach(img => {
        img.addEventListener("click", function(e) {
            mainImg.src = img.src;
        });
    });

    mainImg.addEventListener("click", function(e) {
        zoomedImg.src = mainImg.src;
        zoomedImg.alt = "carousel image"
        zoomContainer.style.display = "flex";
        closeImg.style.display = "flex";
        body.style.overflow = "hidden";
    });

    closeImg.addEventListener("click", function() {
        body.style.overflow = "";
        closeZoom();
    })

    zoomContainer.addEventListener("click", function() {
        body.style.overflow = "";
        closeZoom();
    });
});
