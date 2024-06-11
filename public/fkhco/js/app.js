const selectCard = document.querySelectorAll(".card"),
    logo = document.querySelector(".logos"),
    shopBtn = document.querySelector(".shop-btn"),
    cartBtn = document.querySelector(".cart-btn"),
    containerGallery = document.querySelector(".product-image-wrap"),
    mainImage = document.querySelector(".currentImg"),
    categoryTitle = document.querySelector(".categoryTitle"),
    selectContainer = document.querySelector(".selectCategory"),
    options = document.querySelectorAll(".option"),
    productTitle = Array.from(document.querySelectorAll(".product-title")),
    userLogin = document.querySelector(".user-btn"),
    signUp = document.querySelector(".sign-up"),
    signIn = document.querySelector(".sign-in"),
    imageDetail = document.querySelectorAll(".image"),
    sizeProduct = document.querySelectorAll(".size"),
    inputUkuran = document.querySelectorAll("#ukuran"),
    inputQty = document.getElementById("qty"),
    increaseButton = document.getElementById("increase"),
    decreaseButton = document.getElementById("decrease");

// Links to Multiple Page
// if (shopBtn) {
//     shopBtn.addEventListener("click", () => {
//         window.location.href = "products.html";
//     });
// }

// selectCard.forEach((card) =>
//     card.addEventListener("click", () => {
//         window.location.href = "product-detail.html";
//     })
// );

if (logo) {
    logo.addEventListener("click", () => {
        window.location.href = "/";
    });
}

if (cartBtn) {
    cartBtn.addEventListener("click", () => {
        window.location.href = "cart.html";
    });
}

if (userLogin) {
    userLogin.addEventListener("click", () => {
        window.location.href = "login.html";
    });
}

if (signUp) {
    signUp.addEventListener("click", () => {
        window.location.href = "register.html";
    });
}

if (signIn) {
    signIn.addEventListener("click", () => {
        window.location.href = "login.html";
    });
}

// DOM Manipulation Gallery Product
if (containerGallery) {
    containerGallery.addEventListener("click", (e) => {
        if (e.target.className == "thumb") {
            mainImage.src = e.target.src;
        }
    });
}

imageDetail.forEach((img) => {
    img.addEventListener("click", () => {
        imageDetail.forEach((image) => {
            image.classList.remove("product-border");
        });
        img.classList.add("product-border");
    });
});

inputUkuran.forEach((uk, index) => {
    uk.addEventListener("click", () => {
        sizeProduct.forEach((sz) => {
            sz.classList.remove("product-border");
        });
        sizeProduct[index].classList.add("product-border");
    });
});

increaseButton.addEventListener("click", () => {
    inputQty.value = parseInt(inputQty.value, 10) + 1;
});

decreaseButton.addEventListener("click", () => {
    inputQty.value =
        parseInt(inputQty.value) <= 1 ? 1 : parseInt(inputQty.value) - 1;
});

// FILTER Category Product
if (selectContainer) {
    selectContainer.addEventListener("change", () => {
        const selectedOption = selectContainer.value;
        categoryTitle.innerText = selectedOption;

        const filteredProduct = productTitle.filter((product) => {
            return product.innerHTML.includes(selectedOption);
        });

        console.log(
            filteredProduct.map((product) => {
                return product.innerHTML;
            })
        );
    });
}
