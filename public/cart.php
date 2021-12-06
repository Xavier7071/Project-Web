<?php
require "websiteFormat.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMPIRE | Panier</title>
    <?php
    echo addLinks();
    ?>
    <script type="module" src="scripts/cart.js"></script>
</head>

<body>
<?php
echo addNavigation();
?>
<div class="main">
    <div class="shopping-cart">
        <div class="row cart-row">
            <span class="cart-item column">Article</span>
            <span class="cart-price column">Prix</span>
            <span class="cart-quantity column">Quantité</span>
        </div>
        <div id="items">
        </div>
        <div class="total">
            <strong class="total-title">TPS :</strong>
            <span class="total-label" id="tps">$0</span> <br>
            <strong class="total-title">TVQ :</strong>
            <span class="total-label" id="tvq">$0</span> <br>
            <strong class="total-title">Total :</strong>
            <span class="total-label" id="price">$0</span>
        </div>
        <button class="btn btn-primary" id="btn-purchase" type="button">Procéder au paiement</button>
    </div>
</div>
<?php
echo addFooter();
echo addScripts();
?>
</body>

</html>
