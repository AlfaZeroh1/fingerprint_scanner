<?php
session_start();
// include "DB.php";
if(empty($_SESSION['userid'])){
    header("Location: teacher_logout.php");
}
