<?php include "session.php"; include "../DB.php";?>
<html>
    <head>  
        <title>Register New Student</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class="cont">
            <table>
                <tr>
                    <th>
                        <h1>My Courses</h1>
                    </th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                        $query = "SELECT * FROM courses WHERE id IN (SELECT courseid from user_courses WHERE userid='".$_SESSION['userid']."')";
                        $execution = $connection->query($query);
                        $results = $execution->fetchAll(PDO::FETCH_ASSOC);
                        foreach($results as $course){
                            echo "<tr>";
                                echo "<td>";
                                    echo $course['coursename'];
                                echo "</td>";
                                echo "<td>";
                                    echo "<button onclick='delete_course(".$course['id'].")'>Delete course</button>";
                                echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tr>
                
                <tr>
                    <form method="post">
                        <th> Add Course</th>
                        <td>
                            <select name="course" id="course">
                                <option selected disabled>Choose a Course</option>
                                <?php
                                    $query = "SELECT * FROM courses WHERE id NOT IN (SELECT courseid from user_courses WHERE userid='".$_SESSION['userid']."')";
                                    $execution = $connection->query($query);
                                    $results = $execution->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($results as $course){
                                        echo "<option value='".$course['id']."'>".$course['coursename']."</option>";
                                    }
                                ?>
                            </select>
                            <input type="submit" name="action" value="edit">
                        </td>
                    </form>
                </tr>
            </table>
        </div>
        <script src="../js/script.js"></script>
    </body>
    
</html>