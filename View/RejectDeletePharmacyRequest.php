<?php
session_start();
include_once '../BusinessLogic/Admin.php';
if(isset($_SESSION['id'])&&$_SESSION['user_type']==1){
    $pharmId=$_GET['pharmId'];
    $admin=new Admin();
    $Rejected=$admin->RejectOrDeletePharmacy($pharmId);
    if($Rejected){
        header("location: AdminRegiserRequest.php");
    }
}
?>

