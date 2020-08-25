<?php
session_start();
include_once '../BusinessLogic/Admin.php';
$userId=$_GET['userId'];
$Admin= new Admin();
$result=$Admin->Delete_user($userId);
if($result) {
    header("location: ViewUser.php");
}
else 
{
    die();
    echo mysqli_error($result);
}
?>
