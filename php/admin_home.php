<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        session_start();
        include "admin_navbar.php";
        include "../DB.php";
        
        $table = "Credentials";
        $_SESSION['tableName'] = $table;
    ?>
    <div class="admin_table_section">
        <div class="admin_table_div">
            <label >Choose table to view:</label>
            <select name="" id="">
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
        </div>
        <button>Click Me</button>
    </div>
    <div id="table_area">
        <table border:= 1; id="table">
            <thead>
                <tr>
                    <?php
                    $retrieveTitles = "DESC $table";
                    $titleResults = $connection->query($retrieveTitles);
                    $titles = $titleResults->fetchAll(PDO::FETCH_COLUMN);
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
                    $retrieveAllData = "SELECT * FROM $table";
                    $dataResults = $connection->query($retrieveAllData);
                    $dataObj = $dataResults->fetchAll(PDO::FETCH_OBJ);

                    foreach($dataObj as $row){
                        // Displaying everything in the textbox
                        echo "<tr id='tableRow'>";
                        foreach($row as $key=>$v){
                            echo "<td id='tableData'>$v</td>";
                        }

                        // The extra buttons
                        echo ("
                        <form action='adminEditRow.php' method='POST'>
                            <td id='adminEdit' align = 'center'>
                                <button name='row_id' type = 'submit' value = ' " . $row->id . " ' id = 'adminEditBtn'>EDIT</button>
                            </td>
                        </form>
                        <form action='adminDeleteRow.php' method='POST'>
                            <td id='adminDelete' align = 'center'>
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