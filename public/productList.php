<?php

require "database.php";
require "websiteFormat.php";

$result = db_query("SELECT * FROM products;");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMPIRE | Produits</title>
    <?php
    echo addLinks();
    ?>
</head>

<body>
<?php
echo addNavigation();
?>
<header class="header-img" id="header-products">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12 text-center header-title">
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
                                <div class="img-container">
                                    <img class="product-image" src="<?= $row["image_url"]; ?>" alt="Product">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="item-name"><?= $row["name"]; ?></h5>
                                    <hr>
                                    <h6 class="mb-3">
                                        <span class="text-danger mr-1"><?= $row["price"]; ?>$</span>
                                    </h6>
                                    <button type="button" class="btn btn-light btn-sm mr-1 mb-2 cart-btn"
                                            data-name="<?= $row["name"] ?>" data-price="<?= $row["price"] ?>"
                                            data-image="<?= $row["image_url"] ?>">
                                        <i class="fas fa-shopping-cart pr-2"></i>Ajouter au panier
                                    </button>
                                    <a type="button" class="btn btn-light btn-sm mr-1 mb-2 detail-btn"
                                       href="detail.php?id=<?= $row["product_id"] ?>">
                                        <i class="fas fa-info-circle pr-2"></i>Voir détails
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
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

