<?php
require "database.php";
require "websiteFormat.php";
require "formVariables.php";

$result = db_query("SELECT email FROM customers;");

$userInputs = getInputsVariables();
$errorMessages = getErrorMessages();

if (isset($_POST["submit"])) {
    $hasError = false;
    $userInputs["firstName"] = $_POST["firstName"];
    $userInputs["lastName"] = $_POST["lastName"];
    $userInputs["email"] = $_POST["email"];
    $userInputs["country"] = $_POST["country"];
    $userInputs["street"] = $_POST["street"];
    $userInputs["city"] = $_POST["city"];
    $userInputs["postalCode"] = $_POST["postalCode"];
    $cartItems = json_decode($_POST["cartItems"]);
    $total = $_POST["total"];

    foreach ($userInputs as $key => $val) {
        if (empty($val)) {
            $hasError = true;
            $errorMessages[$key] = "*Le champs doit être rempli";
        }
    }

    while ($row = pg_fetch_assoc($result)) {
        if ($userInputs["email"] == $row["email"]) {
            $hasError = true;
            $errorMessages["email"] = "*Ce courriel est déjà utilisé";
        }
    }

    if (!$hasError) {
        insert_order($userInputs, $total, $cartItems);
        redirect('confirmation.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPIRE | Paiement</title>
    <?php
    echo addLinks();
    ?>
    <script type="module" src="scripts/form.js"></script>
</head>
<body class="img-body" id="form-body">
<?php
echo addNavigation();
?>
<main>
    <div class="formContainer text-black">
        <h2 class="text-center">Informations personnelles</h2>

        <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="first-name" class="form-label">Prénom
                        <div class="errorMessage"><?php echo $errorMessages["firstName"] ?></div>
                    </label>
                    <input type="text" class="form-control" id="first-name" name="firstName"
                           value="<?= $userInputs["firstName"] ?>">
                </div>
                <div class="col-6">
                    <label for="last-name" class="form-label">Nom
                        <div class="errorMessage">
                            <?php echo $errorMessages["lastName"] ?>
                        </div>
                    </label>
                    <input type="text" class="form-control" id="last-name" name="lastName"
                           value="<?= $userInputs["lastName"] ?>">
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Courriel
                        <div class="errorMessage">
                            <?php echo $errorMessages["email"] ?>
                        </div>
                    </label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= $userInputs["email"] ?>">
                </div>
                <div class="col-6">
                    <label for="country" class="form-label">Pays
                        <div class="errorMessage">
                            <?php echo $errorMessages["country"] ?>
                        </div>
                    </label>
                    <input type="text" class="form-control" id="country" name="country"
                           value="<?= $userInputs["country"] ?>">
                </div>
                <div class="col-6">
                    <label for="street" class="form-label">Rue
                        <div class="errorMessage">
                            <?php echo $errorMessages["street"] ?>
                        </div>
                    </label>
                    <input type="text" class="form-control" id="street" name="street"
                           value="<?= $userInputs["street"] ?>">
                </div>
                <div class="col-6">
                    <label for="city" class="form-label">Ville
                        <div class="errorMessage">
                            <?php echo $errorMessages["city"] ?>
                        </div>
                    </label>
                    <input type="text" class="form-control" id="city" name="city"
                           value="<?= $userInputs["city"] ?>">
                </div>
                <div class="col-6">
                    <label for="postalCode" class="form-label">Code postal
                        <div class="errorMessage">
                            <?php echo $errorMessages["postalCode"] ?>
                        </div>
                    </label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode"
                           value="<?= $userInputs["postalCode"] ?>">
                </div>
                <input type="hidden" class="form-control" id="cartItems" name="cartItems"
                       value="">
                <input type="hidden" class="form-control" id="total" name="total"
                       value="">
            </div>
            <div class="col text-center">
                <button class="btn btn-primary" id="submit-btn" type="submit" name="submit">Soumettre</button>
            </div>
        </form>
    </div>
</main>
<?php
echo addFooter();
echo addScripts();
?>
</body>
</html>