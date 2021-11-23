<?php
include "websiteFormat.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMPIRE | Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/nav.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/footer.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/style.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/content.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/card.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/cart.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/mobile.css?<?php echo time(); ?>"/>
    <script type="module" src="scripts/app.js?<?php echo time(); ?>"></script>
</head>

<body class="img-body" id="cart-body">
<?php
echo addNavigation();
?>
<div class="main">
    <div class="shopping-cart">
        <div class="cart-row">
            <span class="cart-item column">Article</span>
            <span class="cart-price column">Prix</span>
            <span class="cart-quantity column">Quantité</span>
            <span class="cart-subTotal column">Sous-Total</span>
        </div>
        <div class="items">
        </div>
        <div class="total">
            <strong class="total-title">TPS :</strong>
            <span class="total-label" id="tps">$0</span> <br>
            <strong class="total-title">TVQ :</strong>
            <span class="total-label" id="tvq">$0</span> <br>
            <strong class="total-title">Total :</strong>
            <span class="total-label" id="price">$0</span>
        </div>
        <button class="btn btn-primary btn-purchase" type="button">Procéder au paiement</button>
    </div>
</div>
<?php
echo addFooter();
echo addScripts();
?>
</body>

</html>
