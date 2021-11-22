<?php

require "database.php";
include "websiteFormat.php";

$db = db_connect();

$sql = "SELECT * FROM products;";
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
    <title>EMPIRE | Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/nav.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/footer.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/style.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/content.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/card.css?<?php echo time(); ?>"/>
    <link rel="stylesheet" href="stylesheets/mobile.css?<?php echo time(); ?>"/>
    <script type="module" src="scripts/app.js?<?php echo time(); ?>"></script>
</head>

<body>
<?php
echo addNavigation();
?>
<header class="headerImg" id="headerProducts">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12 text-center headerTitle">
                <h1>THINK EMPIRE</h1>
            </div>
        </div>
    </div>
</header>
<div class="main">
    <div class="title"><h2>Liste de nos produits</h2></div>
    <div class="container">
        <div class="item-container">
            <div class="row">
                <?php
                while ($row = pg_fetch_assoc($result)) {
                    $id = str_pad($row["product_id"], 3, 0, STR_PAD_LEFT);
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="item">
                                <div class="imgContainer">
                                    <img class="product-image" src="<?= $row["image_url"]; ?>" alt="Product">
                                </div>
                                <div class="card-body text-center">
                                    <h5><?= $row["name"]; ?></h5>
                                    <hr>
                                    <h6 class="mb-3">
                                        <span class="text-danger mr-1"><?= $row["price"]; ?>$</span>
                                    </h6>
                                    <button type="button" class="btn btn-light btn-sm mr-1 mb-2 cartBtn">
                                        <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                                    </button>
                                    <a type="button" class="btn btn-light btn-sm mr-1 mb-2 detailBtn" href="detail.php?id=<?= $row["product_id"] ?>">
                                        <i class="fas fa-info-circle pr-2"></i>Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                pg_close($db);
                ?>
            </div>
        </div>
    </div>
</div>
<?php
echo addFooter();
echo addScripts();
?>
</body>

</html>

