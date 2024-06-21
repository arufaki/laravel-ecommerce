// Arrow Open Shipping Select

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
});

// Select Courier for Shipping

const expedition = document.querySelector(".expedition");
const estimate = document.querySelector(".estimate");
const couriers = document.querySelectorAll(".courier");
const inputExpedition = document.getElementById("expedition-input");

couriers.forEach((courier) => {
    courier.addEventListener("click", function () {
        const courierName = this.querySelector(".courier-name").textContent;
        const estimateCourier =
            this.querySelector(".select-estimate").textContent;

        expedition.textContent = courierName;
        estimate.textContent = estimateCourier;
        inputExpedition.value = courierName;

        arrowLeft.style.transform = "rotate(40deg)";
        arrowRight.style.transform = "rotate(-40deg)";
        shippingSelect.style.display = "none";
    });
});

// Bank payment select for paying a checkout product

const bankProvider = document.querySelectorAll(".bank");
const bcaBank = document.querySelector(".bca");
const briBank = document.querySelector(".bri");
const bniBank = document.querySelector(".bni");
const mandiriBank = document.querySelector(".mandiri");
const accountNumber = document.querySelector(".accountNumber");

const accountNumberData = [
    {
        id: 1,
        providerName: "bca",
        virtualAccount: "8474-8273-2819-127",
    },
    {
        id: 2,
        providerName: "bri",
        virtualAccount: "2948-4829-3829-042",
    },
    {
        id: 3,
        providerName: "bni",
        virtualAccount: "1849-9583-2893-012",
    },
    {
        id: 4,
        providerName: "mandiri",
        virtualAccount: "0281-4283-2314-654",
    },
];

// default number Virtual Account when the modal first appeared
const defaultModalVA = (accountNumber.textContent =
    accountNumberData[0].virtualAccount);

bankProvider.forEach((banks) => {
    banks.addEventListener("click", () => {
        // Select bank one per one and adding black border
        bankProvider.forEach((b) => b.classList.remove("bankSelected"));

        banks.classList.add("bankSelected");

        // Search a virtual account by clicking a provider bank
        const bankAnalyze = banks.classList[1];

        const findVirtualAccount = accountNumberData.find(
            (data) => data.providerName == bankAnalyze
        );

        accountNumber.textContent = findVirtualAccount.virtualAccount;
    });
});
