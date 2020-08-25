<?php 
session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';

  if (isset($_GET['product_id']))
 {
 // get id value
 $product_id = $_GET['product_id'];

 $id=$_GET['id'];
 }
 //echo  $offerID ;
 
    $Quantity=$_POST['quantity'];
   
; 
    $pharmacy_Admin= new Pharmacy_Admin();
    if( $Quantity==""  ){
        $_SESSION['error']="incomplete data";
		echo $_SESSION['error'];
      //  header("location: OfferAddToPharmacy.php");
    }
    else{
    $inserteddata= $pharmacy_Admin->editproductpharmacy($Quantity,$product_id,$id);
	//echo  $inserteddata;
	$_SESSION['sucess']="drug edit to your pharmacy list sucessfully ";
   echo $_SESSION['sucess'];
    header("location: PharmacyDrugs.php");
  
   
    }
    
