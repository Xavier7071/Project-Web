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

function db_query($sql) {
    $db = db_connect();
    $result = pg_query($db, $sql);
    if (!$result) {
        echo pg_last_error($db);
        exit;
    }
    pg_close($db);
    return $result;
}