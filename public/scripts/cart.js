import CartTemplate from "./templates/CartTemplate.js";
import {getItems, removeStorageItem, updateQuantity} from "./helpers/storage.js";

addItemsToCart();
loadEventListeners();
updateTotal();

function addItemsToCart() {
    const cartTemplate = new CartTemplate();
    $("#items").append(cartTemplate.addItems());
}

function loadEventListeners() {
    $(".btn-remove").on("click", (event) => {
        removeStorageItem(event);
        updateTotal();
    });
    $(".quantity-input").on("change", (event) => {
        updateQuantity(event);
        updateTotal();
    });
    $("#btn-purchase").on("click", goToForm);
}

function updateTotal() {
    let tps, tvq, total = 0;
    let items = getItems();
    jQuery.each(items, function (index, item) {
        total += item.quantity * item.price;
    });

    tps = Math.round((total * 0.05) * 100) / 100;
    tvq = Math.round((total * 0.09975) * 100) / 100;
    total = Math.round((total + tps + tvq) * 100) / 100;

    $("#tps").html(tps + '$');
    $("#tvq").html(tvq + '$');
    $("#price").html(total + '$');
    localStorage.setItem('total', total);
}

function goToForm() {
    window.location.href = "form.php";
}