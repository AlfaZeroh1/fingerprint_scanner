<?php include "teacher_session.php";
include "../DB.php"; ?>
<?php
session_start();
?>
<html>
  <head>
    <title>Teacher View Student Attendance</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <?php include "teacher_navbar.php"; ?>
  <div class="cont">
        <table>
            <tr>
                <th>
                    <h4>#</h4>
                </th>
                <th>
                    <h4>First name</h4>
                </th>
                <th>
                    <h4>Regitration Number</h4>
                </th>
                <th>
                    <h4>Total Attendance</h4>
                </th>
            </tr>
            <tr>
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $query = "SELECT DISTINCT a.studentid, a.courseid, s.firstname, s.regno, t.total_attendance
                    FROM attendance a
                    JOIN (
                        SELECT studentid, COUNT(courseid) as total_attendance
                        FROM attendance
                        WHERE courseid = '".$_POST['course']."'
                        GROUP BY studentid
                    ) t ON a.studentid = t.studentid
                    JOIN students s ON s.id = a.studentid
                    WHERE a.courseid = '".$_POST['course']."'";
                    $mm = $query;
                    $execution = $connection->query($query);
                    $results = $execution->fetchAll(PDO::FETCH_ASSOC);
                    $i=1;
                    foreach($results as $course){
                        echo "<tr>";
                            echo "<td>";
                                echo $i;
                            echo "</td>";
                            echo "<td>";
                                echo $course['firstname'];
                            echo "</td>";
                            echo "<td>";
                            echo $course['regno'];
                            echo "</td>";
                            echo "<td>";
                            echo $course['total_attendance'];
                            echo "</td>";
                        echo "</tr>";
                        $i++;
                    }
                }
                
                ?>
                </tr>
            
        </table>
       </div>
       <script src="../js/script.js"></script>
  </body>
</html>