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
                    echo "
                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Signed In</th>
                            <th>Signed Out</th>
                        </tr>
                    ";

                    $query2 = "SELECT c.coursename, a.signed_in, a.signed_out FROM attendance a LEFT JOIN courses c ON c.id = a.courseid WHERE a.courseid = '".$_POST['selectedCourse']."' AND a.studentid=(SELECT id from students WHERE userid = '".$_SESSION['userid']."')";
                    // die($query2);

                    $execution2 = $connection->query($query2);
                    $results2 = $execution2->fetchAll(PDO::FETCH_OBJ);
                    $i=1;
                    foreach($results2 as $data) {
                        echo "<tr>";
                            echo "<td>$i</td>";
                            foreach ($data as $key => $value) {
                                echo "<td>$value</td>";
                            }
                            $i++;
                        echo "</tr>";
                    }
                }
                
                ?>
            </table>
        <script src="../js/script.js"></script>
    </body>
</html>