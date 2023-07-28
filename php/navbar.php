<?php
session_start();
$loggedin = false;
if(count($_SESSION)>0){
    $loggedin = true;
}
?>
<div class="navbar">

    
            <?php
                if($loggedin){
            ?>
                    <div class="title" onclick="window.location.href='attendance.php'">
                        <div class="user_name" style="font-size:20px;">Welcome, <?php echo $_SESSION['username'];?></div>
                    </div>
            <?php
                }
            ?>
            <?php
                if($loggedin){
            ?>
                    <div class="nav_link" onclick="window.location.href='attendance.php'">
                        <img src="../images/png/home.png">
                        <a href="attendance.php" >Home</a>
                    </div>
            <?php
                }
            ?>
            <?php
                if($loggedin){
            ?>
                    <div class="nav_link" onclick="window.location.href='edit.php'">
                        <img src="../images/png/profile.png">
                        <a href="edit.php" >My Profile</a>
                    </div>
            <?php
                }
            ?>
            
            <?php
                if($loggedin){
            ?>
                    <div class="nav_link" onclick="window.location.href='courses.php'">
                        <img src="../images/png/book.png">
                        <a href="courses.php">My courses</a>
                    </div>
            <?php
                }
            ?>
            <?php
                if($loggedin){
            ?>
                    <div class="nav_link" onclick="window.location.href='logout.php'">
                        <img src="../images/png/logout(1).png">
                        <a href="logout.php">Logout</a>
                    </div>
            <?php
                }
            ?>
            <?php
                if(1==1){
            ?>
                    <div class="nav_link" onclick="toggle_darkmode()">
                        <img src="../images/png/dark.png">
                    </div>
            <?php
                }
            ?>
        </div>