<?php

session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';
$branch_id=$_POST['branch_id'];


$branch=new Pharmacy_Admin();

$DeleteBranch= $branch->DeleteBranch($branch_id);
if($DeleteBranch){
header("location:PharmacyBranches.php");
}
    
