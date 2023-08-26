<?php
session_start();
include "../index.php"; 
include "../DB.php";
if (isset($_POST['row_id'])) {
    $rowId = $_POST['row_id'];
    echo "Row selected: " . $rowId. "<br>";
    echo "Table selected: ".$_SESSION['selectedTable'];

    $deleteCommand = "DELETE FROM " . $_SESSION['selectedTable'] . " WHERE id = $rowId";
    echo "<br>Command: ".$deleteCommand;
    $connection->query($deleteCommand);


    header("Location: admin_home.php");
    exit();
}
?>