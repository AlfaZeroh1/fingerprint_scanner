<?php
session_start();
$loggedin = false;
if (count($_SESSION) > 0) {
    $loggedin = true;
}
?>
<div class="navbar">
    <?php
    if ($loggedin) {
    ?>
        <div class="title" onclick="window.location.href='teacher_attendance.php'">
            <span class="user_name">Welcome, <?php echo $_SESSION['username']; ?></span>
        </div>
    <?php
    }
    ?>
    <?php
    if ($loggedin) {
    ?>
        <div class="nav_link" onclick="window.location.href='teacher_edit.php'">
            <img src="../images/png/profile.png">
            <a href="teacher_edit.php">My Profile</a>
        </div>
    <?php
    }
    ?>

    <?php
    if ($loggedin) {
    ?>
        <div class="nav_link" onclick="window.location.href='teacher_attendance.php'">
            <img src="../images/png/book.png">
            <a href="teacher_courses.php">My courses</a>
        </div>
    <?php
    }
    ?>
    <?php
    if ($loggedin) {
    ?>
        <div class="nav_link" onclick="window.location.href='teacher_logout.php'">
            <img src="../images/png/logout(1).png">
            <a href="teacher_logout.php">Logout</a>
        </div>
    <?php
    }
    ?>
    <?php
    if (1 == 1) {
    ?>
        <div class="nav_link" onclick="toggle_darkmode()">
            <img src="../images/png/dark.png">
        </div>
    <?php
    }
    ?>
</div>