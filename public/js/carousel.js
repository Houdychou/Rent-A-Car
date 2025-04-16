document.addEventListener("DOMContentLoaded", function () {
    const allCarouselImg = document.querySelectorAll(".carousel img");
    const mainImg = document.querySelector(".mainImg");
    const body = document.querySelector("body");

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
    content.appendChild(closeImg);

    let rightArrow = document.createElement("i");
    rightArrow.className = "ri-arrow-right-line";
    rightArrow.style.display = "none";
    rightArrow.style.position = "absolute";
    rightArrow.style.top = "50%";
    rightArrow.style.right = "10px";
    rightArrow.style.transform = "translateY(-50%)";
    rightArrow.style.backgroundColor = "white";
    rightArrow.style.borderRadius = "50%";
    rightArrow.style.padding = "10px";
    rightArrow.style.fontSize = "20px";
    rightArrow.style.cursor = "pointer";
    rightArrow.style.zIndex = "10";
    content.appendChild(rightArrow);

    let leftArrow = document.createElement("i");
    leftArrow.className = "ri-arrow-left-line";
    leftArrow.style.display = "none";
    leftArrow.style.position = "absolute";
    leftArrow.style.top = "50%";
    leftArrow.style.left = "5px";
    leftArrow.style.transform = "translateY(-50%)";
    leftArrow.style.backgroundColor = "white";
    leftArrow.style.borderRadius = "50%";
    leftArrow.style.padding = "10px";
    leftArrow.style.fontSize = "20px";
    leftArrow.style.cursor = "pointer";
    leftArrow.style.zIndex = "10";
    content.appendChild(leftArrow);

    function closeZoom() {
        zoomContainer.style.display = "none";
    }

    let currentIndex = 0;

    allCarouselImg.forEach((img, i) => {
        img.addEventListener("click", function (e) {
            mainImg.src = img.src;
            currentIndex = i;
        });
    });

    mainImg.addEventListener("click", function (e) {
        zoomedImg.src = mainImg.src;
        zoomedImg.alt = "carousel image"
        zoomContainer.style.display = "flex";
        closeImg.style.display = "flex";
        leftArrow.style.display = "flex";
        rightArrow.style.display = "flex";
        body.style.overflow = "hidden";
    });

    rightArrow.addEventListener("click", function (e) {
        currentIndex = (currentIndex + 1) % allCarouselImg.length;
        zoomedImg.src = allCarouselImg[currentIndex].src;
    })

    leftArrow.addEventListener("click", function (e) {
        currentIndex = (currentIndex - 1 + allCarouselImg.length) % allCarouselImg.length;
        zoomedImg.src = allCarouselImg[currentIndex].src;
    });

    closeImg.addEventListener("click", function (e) {
        body.style.overflow = "";
        closeZoom();
    });

    document.addEventListener("keydown", function (e) {
        if (zoomContainer.style.display === "flex") {
            if (e.key === "ArrowRight") {
                rightArrow.click();
            } else if (e.key === "ArrowLeft") {
                leftArrow.click();
            } else if (e.key === "Escape") {
                body.style.overflow = "";
                closeZoom();
            }
            return;
        }
        if (e.key === "ArrowRight") {
            currentIndex = (currentIndex + 1) % allCarouselImg.length;
            mainImg.src = allCarouselImg[currentIndex].src;
        } else if (e.key === "ArrowLeft") {
            currentIndex = (currentIndex - 1 + allCarouselImg.length) % allCarouselImg.length;
            mainImg.src = allCarouselImg[currentIndex].src;
        }
    })
});
