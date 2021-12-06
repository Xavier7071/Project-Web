<?php

$host = "localhost";
$port = "5432";
$databaseName = "postgres";

$username = "etudiant";
$password = "Etudiant1";

$connectionString = "host=$host port=$port dbname=$databaseName user=$username password=$password";

function db_connect()
{
    global $connectionString;
    $db = pg_connect($connectionString);
    if (!$db) {
        echo "Error: Unable to open database.";
    }
    return $db;
}

function db_query($sql)
{
    $db = db_connect();
    $result = pg_query($db, $sql);
    if (!$result) {
        echo pg_last_error($db);
        exit;
    }
    pg_close($db);
    return $result;
}

function insert_order($userInfos, $total, $cartItems)
{
    $db = db_connect();
    $result = pg_query($db, "INSERT INTO customers (firstname, lastname, email) VALUES ('$userInfos[firstName]', '$userInfos[lastName]', '$userInfos[email]') RETURNING customer_id;");
    $insertRow = pg_fetch_row($result);
    $insertedId = $insertRow[0];

    $result = pg_query($db, "INSERT INTO orders (customer_id, country, street, city, zip_code, total) VALUES ($insertedId, '$userInfos[country]', '$userInfos[street]', '$userInfos[city]', '$userInfos[postalCode]', $total) RETURNING order_id;");
    $insertRow = pg_fetch_row($result);
    $insertedId = $insertRow[0];

    foreach ($cartItems as $item) {
        $result = pg_query($db, "SELECT product_id FROM products WHERE name = '$item->name'");
        $insertRow = pg_fetch_row($result);
        $productId = $insertRow[0];
        $productId = (int)$productId;
        pg_query($db, "INSERT INTO order_items (price, name, quantity, order_id, product_id) VALUES ($item->price, '$item->name', $item->quantity, $insertedId, $productId)");
    }
    pg_close($db);
}