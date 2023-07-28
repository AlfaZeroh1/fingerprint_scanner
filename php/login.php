<?php include "index.php"; ?>
<?php
if($_POST['action']=='login'){
    // connect to DB
    include "../DB.php";
    // Verify Authentication
    $query = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."' and role='student' ";
    $execution = $connection->query($query);
    $results = $execution->fetchAll(PDO::FETCH_ASSOC);

    if(count($results) > 0){
        // print_r($results);
        // die();
        // user exists
        session_start();
        $_SESSION['userid'] = $results[0]['id'];
        $_SESSION['username'] = $results[0]['username'];
        $_SESSION['userid']."'";
        
        $sql = "SELECT * FROM students WHERE userid = '".$_SESSION['userid']."' ";
        $execution = $connection->query($sql);
        $results = $execution->fetchAll(PDO::FETCH_ASSOC);
        
        if(count($results) > 0){
        $_SESSION['studentid'] = $results[0]['id'];
        header("Location: attendance.php");
        }
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