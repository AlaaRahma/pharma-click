<?php

session_start();
include_once '../BusinessLogic/Cart.php';
$drgId=$_POST['drug_id'];
$pharmacyId=$_POST['pharmacy_id'];

$cart=new Cart();

$DeleteProduct= $cart->DeleteDrug($drgId,$_SESSION['id'],$pharmacyId);
if($DeleteProduct){
header("location:cartView.php");
}
    
    

?>