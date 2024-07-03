const selectBrand = document.getElementById("selectBrand");
const selectCategory = document.getElementById("selectCategory");
const productsMaster = document.querySelectorAll(".card");

function multipleSortProduct(userSelected) {
    [...productsMaster].forEach((product) => {
        const sortBrand =
            product.dataset.brand === userSelected ||
            userSelected === "allBrand";

        const sortCategory =
            product.dataset.category === userSelected ||
            userSelected === "allCategory";

        // console.log(`Product: ${product.textContent}`);
        // console.log(`  Brand matches: ${sortBrand}`);
        // console.log(`  Category matches: ${sortCategory}`);

        product.style.display = sortBrand || sortCategory ? "" : "none";
    });
}

selectBrand.addEventListener("change", (e) => {
    const brandSelected = e.target.value;

    multipleSortProduct(brandSelected);

    // [...productsMaster].forEach((product) => {
    //     const display =
    //         product.dataset.brand === brandSelected ||
    //         brandSelected === "allBrand";
    //     product.style.display = display ? "" : "none";
    // });
});

selectCategory.addEventListener("change", (e) => {
    const categorySelected = e.target.value;

    multipleSortProduct(categorySelected);
    // [...productsMaster].forEach((product) => {
    //     const display =
    //         product.dataset.category === categorySelected ||
    //         categorySelected === "allCategory";
    //     product.style.display = display ? "" : "none";
    // });
});
