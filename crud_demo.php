<?php
// This will guide you on how to crud mysql via php
// it contains all statements we'll use throughout the system

// **************************************************************************************
// for it to work, we first connect to db
include "../DB.php";
// **************************************************************************************

// These are the statements you'll use to crud the DB
// WE are using PDO fyi
// We first declare and SQL statement like so:
$query = "SELECT * FROM users";
// Ther are two ways to prepare and execute statements
    // method 1
        // THEN we Prepare the SQL statement
        $stmt = $connection->prepare($query);
        // Then we execute the query like so
        // Execute the prepared statement
        $stmt->execute();
    // method 2
    $stmt = $connection->query($query);
// IF the query returns something like in a SELECT statement, 
// you can fetch it and store it in an associative array using this
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // results is an associative array so to read data inside it,
    //  you can use a loop condition like so
    foreach ($results as $row) {
        print_r($row);
        echo "<br><br>";
        echo "<br><br>";
    }
    

// **************************************************************************************
