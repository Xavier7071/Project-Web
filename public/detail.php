<?php

require "database.php";
include "websiteFormat.php";

$db = db_connect();

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE product_id = $id";
$result = pg_query($db, $sql);
if (!$result) {
    echo pg_last_error($db);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMPIRE | Produit</title>
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

<body class="img-body" id="detail-body">
<?php
echo addNavigation();
?>
<div class="main">
    <?php
    while ($row = pg_fetch_assoc($result)) {
        $id = str_pad($row["product_id"], 3, 0, STR_PAD_LEFT);
        ?>
        <div class="container-detail">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card detail-img">
                        <img src="<?= $row["image_url"]; ?>" alt="product">
                    </div>
                </div>
                <div class="col-lg-5 description">
                    <div class="card text-black">
                        <h4 class="box-title mt-5"><?= $row["name"]; ?></h4>
                        <p><?= $row["description"]; ?></p>
                        <h2 class="mt-5">
                            <?= $row["price"]; ?>$
                        </h2>
                        <button class="btn btn-dark btn-rounded" data-original-title="Ajouter au panier">
                            <i class="fa fa-shopping-cart"></i>
                            Ajouter au panier
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    pg_close($db);
    ?>
    <?php
    echo addFooter();
    echo addScripts();
    ?>
</body>

</html>
