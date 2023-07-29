<?php
session_start();
echo "Edit Page";
if (isset($_POST['row_id'])) {
    $rowId = $_POST['row_id'];
    echo "<br>Row Id: ".$rowId;
    echo "<br>Table Name: ".$_SESSION['tableName'];

    
}
?>
