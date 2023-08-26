<?php
include "session.php"; 
include "../DB.php";

$query = "DELETE FROM user_courses WHERE id='".$_POST['linkid']."'";
// die($query);
if($connection->query($query)){
    echo "Success Record Deleted";
}
else{
    echo "Failed To delete Record";
}
?>