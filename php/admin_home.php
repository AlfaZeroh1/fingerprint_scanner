<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/update.css">
</head>
<body>
    <?php
        session_start();
        include "admin_navbar.php";
        include "../index.php"; 
        include "../DB.php";
        
    ?>
    <div class="admin_table_section">
            <form method="post" action="adminSelectedTable.php" class="admin_table_div">
                <label >Choose table to view:</label>
                <select name="selected_table" id="selected_table">
                    <?php
                try {
                    $retrieveTables = "SHOW TABLES";
                    $results = $connection->query($retrieveTables);
                    $data = $results->fetchAll(PDO::FETCH_COLUMN);
                    
                    foreach ($data as $tableName) {
                        echo "<option value='$tableName'>$tableName</option>";
                    }
                }
                catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </select>
            <button type="submit" name="selectTable">Show Table</button>
        </form>
    </div>
    <div id="table_area">
        <table border:= 1; id="table">
            <thead>
                <tr>
                    <?php
                    echo "<h2>Current Table Name:" .$_SESSION['selectedTable']. "</h2><br>";
                    // Retrieving the titles from database
                    $retrieveTitles = "DESC ".$_SESSION['selectedTable'];
                    $titleResults = $connection->query($retrieveTitles);
                    $titles = $titleResults->fetchAll(PDO::FETCH_COLUMN);
                    $_SESSION['tableTitles'] = $titles;

                    // Displaying the titles
                    foreach($titles as $title) {
                        echo "<th>$title</th>";
                    }
                    ?>
                    <?php
                        $obj = new stdClass();
                        $obj->admin = 1;
                        echo "<th>EDIT</th><th>DELETE</th>";
                    ?>
                </tr>
                    <?php
                    // Retrieving the rest of the data
                    $retrieveAllData = "SELECT * FROM ".$_SESSION['selectedTable'];
                    $dataResults = $connection->query($retrieveAllData);
                    $dataObj = $dataResults->fetchAll(PDO::FETCH_OBJ);

                    foreach($dataObj as $row){
                        echo "<tr id='tableRow'>";
                        foreach($row as $key=>$v){
                            if ($v == null){
                                echo "<td id='tableData'>Null</td>";
                            }
                            else {
                                echo "<td id='tableData'>$v</td>";
                            }
                        }
                        
                        // The extra buttons
                        echo ("
                        <form action='adminUpdate.php' method='POST'>
                            <td id='adminEdit' align='center''>
                                <button name='row_id' type = 'submit' value = ' " . $row->id . " ' class = 'adminEditBtn'>EDIT</button>
                            </td>
                        </form>
                        <form action='adminDeleteRow.php' method='POST'>
                            <td id='adminDelete' align='center'>
                                <button name='row_id' type = 'submit' value = ' " . $row->id . " ' id = 'adminDeleteBtn'>DELETE</button>
                            </td>
                        </form>
                            ");
                    }
                    ?>
            </thead>
        </table>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>