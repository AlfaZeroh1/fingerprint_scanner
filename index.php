<?php
session_start();
include "DB.php";

if(empty($_SESSION['userid'])){
    header("Location: php/login.php");
}
// continue with your current page


 ?>