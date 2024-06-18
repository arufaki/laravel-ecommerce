const increaseButton = document.getElementById("increase"),
    decreaseButton = document.getElementById("decrease"),
    inputQty = document.getElementById("qty");

increaseButton.addEventListener("click", () => {
    inputQty.value = parseInt(inputQty.value, 10) + 1;
});

decreaseButton.addEventListener("click", () => {
    inputQty.value =
        parseInt(inputQty.value) <= 1 ? 1 : parseInt(inputQty.value) - 1;
});
