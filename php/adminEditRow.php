<?php
session_start();

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include "../index.php"; 
include "../DB.php";
if (isset($_POST['updateButton'])) {
    $rowId = $_POST['updateButton'];
    echo "<strong>Row selected: </strong>" . $_SESSION['RowSelected']. "<br>";
    echo "<strong>Table selected: </strong>".$_SESSION['selectedTable'];


    // Retrieve Titles again
    $count = count($_SESSION['tableTitles']);
    echo "<br><strong>Length:</strong> ".$count;

    $updateCommand = "UPDATE " . $_SESSION['selectedTable'] . "
    SET ";
    for ($i = 1; $i < $count; $i++) {
        $columnName = $_SESSION['tableTitles'][$i];
        $newColumnValue = $_POST[$_SESSION['tableTitles'][$i]];

        $updateCommand .= $columnName . " = '" . $newColumnValue ."' ";
        if ($i < $count-1) {
            $updateCommand .= ", ";
        }
        else {
            $updateCommand .= " ";
        }
    }
    $updateCommand .= "WHERE id = " . $_SESSION['RowSelected'];


    echo "<br><br><strong>Command: </strong>".$updateCommand;

    $connection->query($updateCommand);


    header("Location: admin_home.php");
    exit();
}
else{
    echo "Button was never clicked.";
}
?>