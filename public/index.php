<?php

require "database.php";
include "websiteFormat.php";

$sql = "SELECT * FROM products JOIN top_products tp on products.product_id = tp.product_id;";
$result = db_query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMPIRE | Accueil</title>
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

<body>
<?php
echo addNavigation();
?>
<header class="header-img" id="header-home">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12 text-center header-title">
                <h1>THINK EMPIRE</h1>
            </div>
        </div>
    </div>
</header>
<div class="main">
    <div class="title"><h2>Nos produits les plus populaires</h2></div>
    <div id="carouselTopProducts" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $nbItems = 1;
            while ($row = pg_fetch_assoc($result)) {
                $id = str_pad($row["product_id"], 3, 0, STR_PAD_LEFT);
                ?>

                <div class="<?php if ($nbItems == 1) {
                    echo "carousel-item active";
                } else {
                    echo "carousel-item";
                } ?>">
                    <a href="detail.php?id=<?= $row["product_id"] ?>"><img class="d-block w-100"
                                                                           src="<?= $row["image_url"]; ?>"
                                                                           alt="Top-Product"></a>
                </div>
                <?php
                $nbItems++;
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTopProducts"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTopProducts"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>
<?php
echo addFooter();
echo addScripts();
?>
</body>

</html>
