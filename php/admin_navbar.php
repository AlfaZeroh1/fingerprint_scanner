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
                                <span class="user_name" >Welcome,
                                    <?php echo $_SESSION['admin'];?>
                                </span>
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
                    <div class="nav_link" onclick="window.location.href='logout.php'">
                        <img src="../images/png/logout(1).png">
                        <a href="logout.php">Logout</a>
                    </div>
            <?php
                if(1==1){
            ?>
                    <div class="nav_link" onclick="toggle_darkmode()">
                        <img src="../images/png/dark.png">
                    </div>
            <?php
                }
            ?>
            <script src='../js/script.js'></script>
        </div>