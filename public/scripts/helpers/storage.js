export function addStorageItem(item) {
    if (localStorage.getItem('cartItems') == null) {
        localStorage.setItem('cartItems', '[]');
    }
    let items = getItems();
    if (items.some(e => e.name === item.name)) {
        for (let i = 0; i < items.length; i++) {
            if (items[i].name === item.name) {
                items[i].quantity++;
            }
        }
    } else {
        items.push(item);
    }
    setItems(items);
}

export function removeStorageItem(event) {
    let items = getItems();
    items = items.filter(item => item.name !== event.target.parentElement.parentElement.firstElementChild.lastElementChild.innerText);
    setItems(items);
    event.target.parentElement.parentElement.remove();
}

export function updateQuantity(event) {
    let items = getItems()
    items[items.findIndex(item => item.name === event.target.parentElement.parentElement.firstElementChild.lastElementChild.innerText)].quantity = event.target.value
    setItems(items);
}

export function getItems() {
    return jQuery.parseJSON(localStorage.getItem('cartItems'));
}

export function setItems(items) {
    localStorage.setItem('cartItems', JSON.stringify(items));
}