import {getItems} from "./helpers/storage.js";

document.getElementById("cartItems").setAttribute('value', JSON.stringify(getItems()))
document.getElementById("total").setAttribute('value', localStorage.getItem('total'))