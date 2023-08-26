<?php include "teacher_session.php"; include "../DB.php";?>
<?php
include "../index.php"; 
    if($_POST['action']=="add course"){
        // Add Course to User
        $query = "INSERT INTO user_courses(userid,courseid) VALUES('".$_SESSION['userid']."','".$_POST['course']."')";
        if($connection->query($query)){
            // Reload Page
            header("Location: teacher_courses.php");
        }
        else{
            echo "<script>alert('Error!Failed to add Unit')</script>";
        }
    }

?>
<html>
    <head>  
        <title>Register New Student</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <?php include "teacher_navbar.php"; ?>
        <div class="cont">
            <table>
                <tr>
                    <form action="" method="post">
                    
                    <td></td>
                    <td>
                        <select name="courseid" id="courseid">
                            <option selected disabled>Choose a Course</option>
                            <?php
                                $query = "SELECT * FROM courses WHERE id  IN (SELECT courseid from user_courses WHERE userid='".$_SESSION['userid']."')";
                                $execution = $connection->query($query);
                                $results = $execution->fetchAll(PDO::FETCH_ASSOC);
                                foreach($results as $course){
                                    $selected = $course['id']==$_POST['courseid']?'selected':'';
                                    echo "<option $selected value='".$course['id']."'>".$course['coursename']."</option>";
                                }
                            ?>


                        </select>
                        
                    </td>
                    <td>
                        <input type="submit" name="action" value="View students">
                    </td>
                    </form>
                </tr>
                <?php
                    if(isset($_POST['action'])){
                        // Get the Course name
                        $coursename_query = "SELECT * FROM courses WHERE id ='".$_POST['courseid']."'";
                        $coursename_execution = $connection->query($coursename_query);
                        $coursename_results = $coursename_execution->fetchAll(PDO::FETCH_ASSOC);
                        $coursename = $coursename_results[0]['coursename'];
                        ?>
                            <tr>
                                <th>
                                    <b>#</b>
                                </th>
                                <th>
                                    <b><?php echo $coursename; ?></b>
                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>
                                    Registration Number
                                </th>
                                <th>
                                    <b>Student</b>
                                </th>
                                <th>Lessons Attended</th>
                            </tr>
                            <!-- Get students Details -->
                            <?php
                                $students_query = "SELECT u.id as userid, s.regno, concat(s.firstname, ' ', s.lastname) AS student FROM users u LEFT JOIN students s on u.id=s.userid LEFT JOIN user_courses uc ON u.id= uc.userid WHERE uc.courseid='".$_POST['courseid']."' AND u.role='student' ";
                                $students_execution = $connection->query($students_query);
                                $students_results = $students_execution->fetchAll(PDO::FETCH_ASSOC);
                                foreach($students_results as $student){
                                    // Get number of lessons student has attended
                                    $attendance_query = "SELECT COUNT(*) as attendance FROM user_courses WHERE userid ='".$student['userid']."'";
                                    $attendance_execution = $connection->query($attendance_query);
                                    $attendance_results = $attendance_execution->fetchAll(PDO::FETCH_ASSOC);
                                    $attendance = $attendance_results[0]['attendance'];
                                    // print out the record
                                    echo "<tr>";
                                        echo "<td>".$student['regno']."</td>";
                                        echo "<td>".$student['student']."</td>";
                                        echo "<td>". $attendance."</td>";
                                    echo "</tr>";
                                }
                            ?>



                        <?php
                        
                    }

                ?>
                
            </table>
        </div>
        <script src="../js/script.js"></script>
    </body>
    
</html>