<?php include "session.php";
include "../DB.php";
session_start();
if ($_POST['action'] == 'edit') {
    echo "listening..";
    // print_r($_POST);
    $select_query = "SELECT students.id FROM students INNER JOIN users ON users.id = students.userid";
    $execution = $connection->query($select_query);
    $results = $execution->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $_SESSION['studentId'] = $results[0]['id'];
        echo $_SESSION['studentId'];

        $select_users = "SELECT * FROM users WHERE id = '" . $_SESSION['userid'] . "'";
        $execute = $connection->query($select_users);
        $res = $execute->fetchAll(PDO::FETCH_ASSOC);
        
        if ($res > 0) {
            $userid = $res[0]['id'];
            $existingpass = $res[0]['password'];
            if ($_POST['curpassword'] == $existingpass) {

                $up_query_user = "UPDATE users SET username ='" . $_POST['username'] . "', password = '" . $_POST['password'] . "' WHERE  id = '" . $_SESSION['userid'] . "' ";
                if ($connection->query($up_query_user)) {
                    $up_query_student = "UPDATE students SET firstname = '" . $_POST['firstname'] . "', lastname = '" . $_POST['lastname'] . "', regno= '" . $_POST['regno'] . "' , fingerprint = '" . $_POST['fingerprint-value'] . "' WHERE id = '" . $_SESSION['studentId'] . "'";
                    if ($connection->query($up_query_student)) {
                        echo "<script>alert('User  and student updated')</script>";
                        header("Location: attendance.php");
                    }
                }
            } else {
                echo "<script>alert('failed to update user, please enter correct password')</script>";
            }
        }
    }else{
        echo "<script>alert('failed to get you id')</script>";
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
            <?php
            // Fetch user details
            $query = "SELECT u.username, s.firstname, s.lastname, s.regno, s.fingerprint FROM users u LEFT JOIN students s on u.id=s.userid WHERE u.id='" . $_SESSION['userid'] . "'";
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
                <input type="text" name="fingerprint-value" class="fingerprint-value" value="<?php echo $user['fingerprint']; ?>">
                <input type="button" onclick="generatCode(event)" value="Update Fingerprint" name="fingerprint" id="fingerprint" class="fingerprint-btn" style="background: black;color:white">
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