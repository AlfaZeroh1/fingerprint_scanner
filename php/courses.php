<?php include "session.php"; include "../DB.php";?>
<?php
    if($_POST['action']=="add course"){
        // Add Course to User
        $query = "INSERT INTO user_courses(userid,courseid) VALUES('".$_SESSION['userid']."','".$_POST['course']."')";
        if($connection->query($query)){
            // Reload Page
            header("Location: courses.php");
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
        <?php include "navbar.php"; ?>
        <div class="cont">
            <table>
                <tr>
                    <th>
                        <h1>#</h1>
                    </th>
                    <th>
                        <h1>My Courses</h1>
                    </th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                        $query = "SELECT uc.id,c.coursename FROM user_courses uc LEFT JOIN courses c ON uc.courseid = c.id WHERE userid='".$_SESSION['userid']."' ";
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
                                    echo $course['coursename'];
                                echo "</td>";
                                echo "<td>";
                                    echo "<button onclick='delete_course(".$course['id'].")'>Delete</button>";
                                echo "</td>";
                            echo "</tr>";
                            $i++;
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
                            
                        </td>
                        <td>
                            <input type="submit" name="action" value="add course">
                        </td>
                    </form>
                </tr>
            </table>
        </div>
        <script src="../js/script.js"></script>
        <script>
            function delete_course(link_id){
                // Prepare the data to be sent in the request (e.g., JSON data)
                var data = {
                    linkid: link_id
                };
                // Make the AJAX POST request using jQuery $.post() method
                $.post("add_course.php", data, function(response) {
                    // Request was successful, handle the response data
                    alert('Success Unit Deleted')
                    console.log(response.message);
                    location.reload();
                })
                .fail(function(xhr, status, error) {
                    // Request failed, handle the error
                    alert('Failed to send Data')
                    console.log(error);
                });
            }
        </script>
    </body>
    
</html>