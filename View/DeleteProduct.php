<?php

session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';
$drug_id=$_POST['drug_id'];
$pharma_id=$_POST['pharma_id'];

$Drug=new Pharmacy_Admin();

$DeleteDrug= $Drug->DeleteDrug($drug_id,$pharma_id);
if($DeleteDrug){
header("location:PharmacyDrugs.php");
}
