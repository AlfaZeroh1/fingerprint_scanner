<?php
session_start();
if (isset($_POST['row_id'])) {
    $rowId = $_POST['row_id'];
    echo $rowId;
    echo $_SESSION['tableName'];
}
?>
