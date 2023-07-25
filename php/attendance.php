<?php include "session.php"; include "../DB.php";?>
<?php
session_start();
?>
<html>
    <head>
        <title>Register Attendance</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php include "navbar.php"; ?>
        
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