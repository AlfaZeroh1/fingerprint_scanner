<?php
session_start();
// include "DB.php";

if(empty($_SESSION['userid'])){
    header("Location: php/login.php");
}
// else{print_r($_SESSION);}
// continue with your current page


 ?>