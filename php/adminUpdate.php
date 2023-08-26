<link rel="stylesheet" href="../css/style.css">
<form action='adminEditRow.php' method="post" class="cont">
    <?php
    session_start();
    include "../index.php"; 
    include "../DB.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $rowId = $_POST['row_id'];
    $_SESSION['RowSelected'] = $_POST['row_id'];
    echo "<br>Selected Row: ".$_SESSION['RowSelected'];


    // Retrieve datatypes
    $retrieveDataTypeCommand = "DESC " . $_SESSION['selectedTable'];
    // echo "Table Name: ".$_SESSION['selectedTable'];
    $dataTypeResults = $connection->query($retrieveDataTypeCommand);
    $dataTypes = $dataTypeResults->fetchAll(PDO::FETCH_OBJ);
    
    
    for ($i = 0; $i < count($_SESSION['tableTitles']); $i++){

        if (strpos($dataTypes[$i]->Type, "datetime") === 0) {
            $type = "date";
            $disabled = '';
            $value = "";
        }
        elseif(strpos($dataTypes[$i]->Type, "varchar") === 0) {
            $type = "text";
            $value = "";
            $disabled = '';
        }
        elseif(strpos($dataTypes[$i]->Type, "int") === 0) {
            $type = "number";
            $disabled = '';
            $value = "";
        }
        if ($dataTypes[$i]->Field == 'id') {
            $value = "value=" . $rowId;
            $disabled = 'disabled';
        }
        echo ("
            <div class='ipt'>
                <label>".$_SESSION['tableTitles'][$i].": </label>
                <input type='".$type."' name=".$_SESSION['tableTitles'][$i]." ".$disabled." $value>
            </div>
        ");
    }
	echo "<button type='submit' name='updateButton' id='update'>Update</button>";
    ?>
</form>