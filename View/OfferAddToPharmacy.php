<?php 
session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';
if (isset($_SESSION['id'])) {
    $DrgID=$_GET ['drug'];

    $Quantity=$_GET['quantity'];
    $price=$_GET['price'];
	$timefrom=$_GET['timefrom'];
	$timeto=$_GET['timeto'];
	$dsc=$_GET['dsc'];
	$offer=$_GET['offer'];
	
   $pharmacyID=$_SESSION['id'];
    /*  echo $DrgID;
	 echo $Quantity;
	 echo $pharmacyID;
	 echo $price; */
    $pharmacy_Admin= new Pharmacy_Admin();
    if($DrgID==" " || $Quantity=="" || $price=="" || $timefrom=="" || $timeto=="" || $dsc=="" || $offer=="" ){
        $_SESSION['error']="incomplete data";
		echo $_SESSION['error'];
        header("location: OfferAddToPharmacy.php");
    }
    else{
    $inserteddata= $pharmacy_Admin->Add_Pharmacy_Offer($DrgID,$pharmacyID,$Quantity,$price,$timefrom,$timeto,$dsc,$offer);
	//echo  $inserteddata;
	$_SESSION['sucess']="Ofer Added to your pharmacy list sucessfully ";
   echo $_SESSION['sucess'];
      header("location: PharmacyOffers.php");
  
   
    }
    
}