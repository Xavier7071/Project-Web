import {addStorageItem} from "./helpers/storage.js";

$(".cart-btn").on("click", addToCart);

function addToCart(event) {
    let item = {
        "name": event.target.getAttribute("data-name"),
        "image": event.target.getAttribute("data-image"),
        "price": event.target.getAttribute("data-price"),
        "quantity": 1
    }
    addStorageItem(item);
}