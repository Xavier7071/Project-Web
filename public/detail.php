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
    <?php
    echo addLinks();
    ?>
</head>

<body>
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
                    <div class="card w-50">
                        <img src="<?= $row["image_url"]; ?>" alt="product"></div>
                </div>
                <div class="col-lg-5">
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
