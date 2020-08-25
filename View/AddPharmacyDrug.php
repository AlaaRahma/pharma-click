<?php 
session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';
if (isset($_SESSION['id'])) {
    $DrgID=$_GET ['drug'];

    $Quantity=$_GET['quantity'];
  
   $pharmacyID=$_SESSION['id'];
    /*  echo $DrgID;
	 echo $Quantity;
	 echo $pharmacyID;
	 echo $price; */
    $pharmacy_Admin= new Pharmacy_Admin();
    if($DrgID==" " || $Quantity==""  ){
        $_SESSION['error']="incomplete data";
		echo $_SESSION['error'];
        header("location: PharmcyAddProduct.php");
    }
    else{
    $inserteddata= $pharmacy_Admin->Add_Pharmacy_Drug($DrgID,$pharmacyID,$Quantity);
//	echo  $inserteddata;
	$_SESSION['sucess']="Drug Added to your pharmacy list sucessfully ";
echo $_SESSION['sucess'];
    header("location: PharmacyDrugs.php");
   
    }
    
}





?>
