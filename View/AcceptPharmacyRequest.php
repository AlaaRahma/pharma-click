<?php
session_start();
include_once '../BusinessLogic/Admin.php';

if(isset($_SESSION['id'])&&$_SESSION['user_type']==1){
    $pharm_Id=$_GET['pharm_Id'];
    $admin= new Admin();
    $RequestDetails=$admin->ViewOneRequest($pharm_Id);
    $email=$RequestDetails['0']['Email'];
    $pharmName=$RequestDetails['0']['Name'];
    $pharm_pass=$RequestDetails['0']['password'];
    $phone=$RequestDetails['0']['phoneNum'];
    $com_reg=$RequestDetails['0']['commercial_reg'];
    $license=$RequestDetails['0']['licence'];
    $Accepted=$admin->RegisterPharmacyUser($email, $pharmName, $pharm_pass, $phone, $com_reg, $license);
    $DeleteRequest=$admin->RejectOrDeletePharmacy($pharm_Id);
            if($Accepted&&$DeleteRequest){
        header("location:AdminRegiserRequest.php");
    }
}

?>

