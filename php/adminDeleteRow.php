<?php
session_start();
include "../DB.php";
if (isset($_POST['row_id'])) {
    $rowId = $_POST['row_id'];
    echo "Row selected: " . $rowId. "<br>";
    echo "Table selected: ".$_SESSION['tableName'];

    $deleteCommand = "DELETE FROM " . $_SESSION['tableName'] . " WHERE id = $rowId";
    $connection->query($deleteCommand);


    header("Location: admin_home.php");
    exit();
}
?>