<?php 
session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';

  if (isset($_GET['offerid']))
 {
 // get id value
 $offerID = $_GET['offerid'];
 }
 //echo  $offerID ;
 
    $Quantity=$_POST['quantity'];
    $price=$_POST['price'];
	$timefrom=$_POST['timefrom'];
	$timeto=$_POST['timeto'];
	$dsc=$_POST['dsc'];
; 
    $pharmacy_Admin= new Pharmacy_Admin();
    if( $Quantity=="" || $price=="" || $timefrom=="" || $timeto=="" || $dsc==""  ){
        $_SESSION['error']="incomplete data";
		echo $_SESSION['error'];
      //  header("location: OfferAddToPharmacy.php");
    }
    else{
    $inserteddata= $pharmacy_Admin->editoffer($Quantity,$price,$timefrom,$timeto,$dsc,$offerID);
	//echo  $inserteddata;
	$_SESSION['sucess']="Offer Added to your pharmacy list sucessfully ";
   echo $_SESSION['sucess'];
     header("location: PharmacyOffers.php");
  
   
    }
    
