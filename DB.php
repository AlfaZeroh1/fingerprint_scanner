<?php
// These are the credentials you'll use to connect to your database
$server_name = "localhost";
$mysql_user = "wise";
$password = "#@Alphaxard1";
$databases_we_are_using = "mark";

try {
    $dbh = new PDO("mysql:host=$server_name;dbname=$databases_we_are_using", $mysql_user, $password);

    // Set PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // You are now connected to the database!
    echo "Connected successfully!";
} catch (PDOException $e) {
    // If there is an error, handle it here
    echo "Connection failed: " . $e->getMessage();
}

?>