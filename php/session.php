<?php
session_start();
// include "DB.php";

if(empty($_SESSION['userid'])){
    header("Location: logout.php");
}
// else{print_r($_SESSION);}
// continue with your current page


 ?>