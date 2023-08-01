<?php include "session.php"; include "../DB.php";?>
<?php
session_start();
?>
<html>
    <head>
        <title>View Attendance</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/display.css">
    </head>

    <body>
        <?php 
        include "navbar.php"; 
    
        ?>
        <?php
        
        ?>
            <table border='1'>
                
                <?php

                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $command = "desc viewAttendance";
                    $titleResult = $connection->query($command);
                    $titleObjs = $titleResult->fetchAll(PDO::FETCH_OBJ);

                    foreach($titleObjs as $obj) {
                        echo "<th>$obj->Field</th>";
                    }

                    $query2 = "SELECT c.coursename, a.signed_in, a.signed_out 
                    FROM courses c 
                    LEFT JOIN attendance a ON c.id = a.courseid
                    WHERE c.id = '".$_POST['selectedCourse']."'";

                    $execution2 = $connection->query($query2);
                    $results2 = $execution2->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach($results2 as $data) {
                        
                        echo "
                            <tr>";
                            foreach ($data as $key => $value) {
                                echo "<td>$value</td>";
                            }
                        "</tr>";
                    }
                    }
                
                ?>
            </table>
        <script src="../js/script.js"></script>
    </body>
</html>