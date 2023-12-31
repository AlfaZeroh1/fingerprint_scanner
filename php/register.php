<?php
if($_POST['action']=='register'){
    // die(print_r($_POST));
    // Connect to DB
    include "../DB.php";
    // print_r($_POST);
    // Query for perfoming a creat Operation
    $query = "INSERT INTO users(username,password,role) VALUES('".$_POST['username']."','".$_POST['password']."','student')";
    // Execute the query
    if($connection->query($query)){
        // New User created
        // Create a new session for user
        session_start();
        $_SESSION['userid'] = $connection->lastInsertId();
        $_SESSION['username'] = $_POST['username'];
        // Now we create a new student
        $query = "INSERT INTO students(firstname,lastname,regno,fingerprint,userid) VALUES('".$_POST['username']."','".$_POST['lastname']."','".$_POST['regno']."','".$_POST['fingerprint']."','".$connection->lastInsertId()."')";
        if($connection->query($query)){
            // New Student Created
            // echo "<script>alert('')</script>";
            $_SESSION['studentid'] = $connection->lastInsertId();
            echo "<script>alert('Welcome Aboard, ".$_POST['username']."'); window.location.href='attendance.php'</script>";
        }
        else{
            echo "<script>alert('Error! Failed to register you as a student. Contact admin for further assistance');window.location.href='attendance.php';</script>";
        }
    }
    else{
        echo "<script>alert('Error! Failed to create  new User')</script>";
    }
}
?>
<html>
    <head>
        <title>Register New Student</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php include "navbar.php"; ?>

        <div class="cont">
            <form method="post">
                <div class="ipt">
                    <label>Enter Firstname</label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                
                <div class="ipt">
                    <label>Enter Lastname</label>
                    <input type="text" name="lastname" id="lastname">
                </div>

                <div class="ipt">
                    <label>Enter Registration/ Admission Number</label>
                    <input type="text" name="regno" id="regno">
                </div>

                <div class="ipt">
                    <label>Enter Your preferred Username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="submit">
                    <label>Scan Fingerprint</label>
                    <input type="submit" name="action" id="fingerprint">
                </div>

                <div class="ipt">
                    <label>Create a Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="ipt">
                    <label>Repeat Password</label>
                    <input type="password" name="repassword" id="repassword">
                </div>

                <div class="submit">
                    <input type="submit" name="action" value="register">
                </div>
                <div class="links">
                    <a href="login.php">Login instead?</a>
                </div>
                <!-- <div class="links"></div> -->
            </form>
        </div>

        <script src="../js/script.js"></script>
    </body>
</html>