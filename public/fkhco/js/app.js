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
    signIn = document.querySelector(".sign-in");

// Links to Multiple Page
if (shopBtn) {
    shopBtn.addEventListener("click", () => {
        window.location.href = "products.html";
    });
}

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
    containerGallery.addEventListener("mouseover", (e) => {
        if (e.target.className == "thumb") {
            mainImage.src = e.target.src;
        }
    });
}

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
