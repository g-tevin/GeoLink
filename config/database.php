<?php
$host = "localhost";
$port = "5432";
$dbname = "glink";
$username = "postgres";
$password = "0000";

try {

    $conn = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $conn->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

} catch (PDOException $e) {

    die("Database Connection Failed: " . $e->getMessage());

}

?>
