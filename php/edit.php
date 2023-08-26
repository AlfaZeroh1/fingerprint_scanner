<?php 
include "../index.php"; 
include "session.php"; include "../DB.php";?>
<html>
    <head>
        <title>Register New Student</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class="cont">
            <form method="post">
                <?php
                // Fetch user details
                 $query = "SELECT u.username, s.firstname, s.lastname, s.regno, s.fingerprint FROM users u LEFT JOIN students s on u.id=s.userid WHERE u.id='".$_SESSION['userid']."'";
                //  die($query);
                 $execution = $connection->query($query);
                 $results = $execution->fetchAll(PDO::FETCH_ASSOC);
                 $user = $results[0];
                ?>
                <div class="ipt">
                    <label>Enter Firstname</label>
                    <input type="text" name="firstname" id="firstname" value="<?php echo $user['firstname']; ?>">
                </div>
                
                <div class="ipt">
                    <label>Enter Lastname</label>
                    <input type="text" name="lastname" id="lastname" value="<?php echo $user['lastname']; ?>">
                </div>

                <div class="ipt">
                    <label>Enter Registration/ Admission Number</label>
                    <input type="text" name="regno" id="regno" value="<?php echo $user['regno']; ?>">
                </div>

                <div class="ipt">
                    <label>Enter Your preferred Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>">
                </div>

                <div class="ipt">
                    <label>Scan Fingerprint</label>
                    <input type="text" name="fingerprint" id="fingerprint" value="<?php echo $user['fingerprint']; ?>">
                </div>

                <div class="ipt">
                    <label>Enter Your Current Password</label>
                    <input type="password" name="curpassword" id="curpassword">
                </div>

                <div class="ipt">
                    <label>Create a new Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="submit">
                    <input type="submit" name="action" value="edit">
                </div>
                <div class="links">
                    <a href="attendance.php">Home</a>
                </div>
                <!-- <div class="links"></div> -->
            </form>
        </div>
        <script src="../js/script.js"></script>
    </body>
</html>