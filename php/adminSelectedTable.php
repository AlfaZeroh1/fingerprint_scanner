<?php
session_start();
include "../index.php"; 
if (isset($_POST['selectTable'])) {
    echo "Table called";
    if (isset($_POST["selected_table"]) && !empty($_POST["selected_table"])) {
        $selectedTable = $_POST["selected_table"];
        echo "<br>You selected table: " . $selectedTable;
        $_SESSION['selectedTable'] = $selectedTable;

        header("Location: admin_home.php");
        exit();
    }
    else {
        echo "<br>Please choose a table to view!";
    }
}
?>