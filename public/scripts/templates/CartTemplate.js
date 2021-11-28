import {getItems} from "../helpers/storage.js";

export default class CartTemplate {
    addItems() {
        let items = getItems();
        let html = "";
        jQuery.each(items, function (index, item) {
            html += `
                <div class="row cart-row">
                    <div class="cart-item column">
                        <img class="item-image" src="${item.image}" width="100" height="100" alt="productImage">
                        <span class="item-title">${item.name}</span>
                    </div>
                    <span class="cart-price column">${item.price}$</span>
                    <div class="cart-quantity column">
                        <input class="quantity-input" type="number" min="1" value="${item.quantity}">
                        <button class="btn btn-remove" type="button">Retirer</button>
                    </div>
                </div>
            `;
        });
        return html;
    }
}