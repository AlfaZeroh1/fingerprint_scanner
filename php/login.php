<?php
include "index.php"; 
include "../DB.php";
?>

<!-- Admin Login logic -->
<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == "admin") {
        session_start();
        $_SESSION['admin'] = $username;
        $_SESSION['password'] = $password;
        $filePath = "admin_home.php";
        header("Location: $filePath");
        exit();
    }
?>

<!-- Users Login Logic -->
<?php
if($_POST['action']=='login'){
    // Verify Authentication
    $query = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."' and role='student' ";
    echo "Users Login Logic called.";
    $execution = $connection->query($query);
    $results = $execution->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($results) > 0){
        // print_r($results);
        // die();
        // user exists
        session_start();
        $_SESSION['userid'] = $results[0]['id'];
        $_SESSION['username'] = $results[0]['username'];
        header("Location: attendance.php");
    }
    else{
        echo "<script>alert('Sorry. I wan unable to authenticate you. Check your credentials then try again')</script>";
    }
}

?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class="cont">
            <form method="post">
                <div class="ipt">
                    <label>Enter Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="ipt">
                    <label>Enter Your Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="submit">
                    <input type="submit" name="action" value="login">
                </div>
                <div class="links">
                    <a href="register.php">Not Registered?</a>
                </div>
                <!-- <div class="links"></div> -->
            </form>
        </div>

        <script src="../js/script.js"></script>
    </body>
</html>