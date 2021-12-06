<?php
require "websiteFormat.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPIRE | Confirmation</title>
    <?php
    echo addLinks();
    ?>
    <script type="module" src="scripts/confirmation.js"></script>
</head>
<body>
<?php
echo addNavigation();
?>
<main>
    <div class="smallContainer text-black" id="confirmContainer">
        <h2 class="text-center">Votre commande a été placée</h2>
        <p class="text-center">Merci d'avoir magasiné chez nous</p>
        <div class="col text-center">
            <button class="btn btn-primary" id="nextPurchase-btn" type="button">Continuer de magasiner</button>
        </div>
    </div>
</main>
<?php
echo addFooter();
echo addScripts();
?>
</body>
</html>