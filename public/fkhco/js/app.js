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
    btnDropdown = document.getElementById("dropdownMenuButton"),
    dropdownMenu = document.querySelector(".dropdown-menu"),
    cartCount = document.querySelector(".cart-count");

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

inputUkuran.forEach((uk, index) => {
    uk.addEventListener("click", () => {
        sizeProduct.forEach((sz) => {
            sz.classList.remove("product-border");
        });
        sizeProduct[index].classList.add("product-border");
    });
});

if (btnDropdown) {
    btnDropdown.addEventListener("click", () => {
        dropdownMenu.classList.toggle("dropdown-active");
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

if (cartCount) {
    if (cartCount.textContent == "0") {
        cartCount.style.display = "none";
    }
}
