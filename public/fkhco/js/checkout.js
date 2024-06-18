const masterAddress = document.querySelector(".shipping-master");
const arrowLeft = document.querySelector(".arrow-left");
const arrowRight = document.querySelector(".arrow-right");
const shippingSelect = document.querySelector(".shipping-select");

masterAddress.addEventListener("click", () => {
    if (arrowLeft.style.transform == "rotate(40deg)") {
        arrowLeft.style.transform = "rotate(-40deg)";
        arrowRight.style.transform = "rotate(40deg)";
        shippingSelect.style.display = "block";
    } else {
        arrowLeft.style.transform = "rotate(40deg)";
        arrowRight.style.transform = "rotate(-40deg)";
        shippingSelect.style.display = "none";
    }
    // arrowRight.style.transform = "rotate(40deg)";
});
