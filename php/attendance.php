<?php include "session.php"; include "../DB.php";?>
<?php
session_start();
?>
<html>
    <head>
        <title>Register Attendance</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php include "navbar.php"; ?>
        
        <div class="cont">
            <div class="ipt">
                    <label>Choose Unit</label>
                    <select name="course" id="course">
                        <option selected disabled>Choose a Course</option>
                        <?php
                            // $query = "SELECT * FROM courses WHERE id NOT IN (SELECT courseid from user_courses WHERE userid='".$_SESSION['userid']."')";
                            $query = "SELECT uc.id,c.coursename FROM user_courses uc LEFT JOIN courses c ON uc.courseid = c.id WHERE userid='".$_SESSION['userid']."' ";
                            $execution = $connection->query($query);
                            $results = $execution->fetchAll(PDO::FETCH_ASSOC);
                            foreach($results as $course){
                                echo "<option value='".$course['id']."'>".$course['coursename']."</option>";
                            }
                        ?>
                    </select>
                </div>
            <!-- <h3 style="text-align:center">You have not Registered Your attendance for this Unit</h3> -->
            <br><br>
            <div class="submit">
                <input type="submit" name="action" value="Mark Attendance">
            </div>
        </div>

        <script src="../js/script.js"></script>
    </body>
</html>