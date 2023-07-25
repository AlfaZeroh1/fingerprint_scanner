<html>
    <head>
        <title>Register Attendance</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div class="navbar">
            <div class="title">
                <span class="user_name" >Welcome, Alpha</span>
            </div>
            
            <div class="nav_link" onclick="window.location.href='edit.php'">
                <img src="../images/png/profile.png">
                <a href="edit.php" >My Profile</a>
            </div>
            <div class="nav_link" onclick="toggle_darkmode()">
                <img src="../images/png/dark.png">
            </div>
            <div class="nav_link" onclick="window.location.href='edit.php'">
                <img src="../images/png/profile.png">
                <a href="edit.php">My Profile</a>
            </div>
            <div class="nav_link" onclick="window.location.href='edit.php'">
                <img src="../images/png/profile.png">
                <a href="edit.php">My Profile</a>
            </div>
            <div class="nav_link" onclick="window.location.href='logout.php'">
                <img src="../images/png/logout(1).png">
                <a href="logout.php">Logout</a>
            </div>
            <div class="unit">
                <span class="user_unit">Current Unit: Unit 1</span>
            </div>
        </div>
        
        <div class="cont">
            <h3 style="text-align:center">You have not Registered Your attendance for this Unit</h3>
            <br><br>
            <div class="submit">
                <input type="submit" name="action" value="Scan Fingerprint">
            </div>
        </div>

        <script src="../js/script.js"></script>
    </body>
</html>