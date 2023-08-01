<?php 
session_start();
include "session.php";
include "../DB.php";
?>
<html>
    <head>
        <title>View Attendance</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php include "navbar.php"; ?>
        <form action='display.php' method='POST'> 
            <div class="cont">
                <div class="ipt">
                        <label>Choose Unit</label>
                        <select name="selectedCourse" id="course">
                            <option selected disabled>Choose a Course</option>
                            <?php   

                                $query = "SELECT c.id,c.coursename FROM user_courses uc LEFT JOIN courses c ON uc.courseid = c.id WHERE userid='".$_SESSION['userid']."' ";
                                // $query ="SELECT courses.coursename, attendance.signed_in, attendance.signed_out FROM courses LEFT JOIN attendance ON courses.id = attendance.courseid GROUP";
                                $execution = $connection->query($query);
                                $results = $execution->fetchAll(PDO::FETCH_ASSOC);
                                foreach($results as $course){
                                    echo "<option value='".$course['id']."'>".$course['coursename']."</option>";
                                }
                            ?>
                        </select>
                    </div>
               
                <br><br>
                <div class="submit">
                    <button type="submit" name="action" id="f_view">View Attendance</button>
                </div>
                <?php
                
                $query2 = "SELECT courses.coursename, attendance.signed_in, attendance.signed_out 
                FROM courses 
                LEFT JOIN attendance ON courses.id = attendance.courseid
                WHERE courses.id = :courseid";

                $execution2 = $connection->query($query2);
                $results2 = $execution2->fetchAll(PDO::FETCH_ASSOC);

                ?>
            </div>
        </form>
        
        <script src="../js/script.js"></script>
    </body>
</html>