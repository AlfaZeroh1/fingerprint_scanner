<?php
ini_set('display_errors', 0); error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
// include "DB.php";

if(empty($_SESSION['userid'])){
    header("Location: php/login.php");
}
// else{print_r($_SESSION);}
// continue with your current page


 ?>