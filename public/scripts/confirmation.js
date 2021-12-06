localStorage.clear();

$("#nextPurchase-btn").on("click", anotherPurchase);

function anotherPurchase() {
    window.location.href = "productList.php";
}