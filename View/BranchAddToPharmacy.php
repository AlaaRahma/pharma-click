<?php 
session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';
if (isset($_SESSION['id'])) {
    

    $City=$_GET['city'];
    $Zone=$_GET['zone'];
	$Address=$_GET['address'];
	$Phone=$_GET['phone'];
	$GoogleURL=$_GET['googleurl'];
	$BranchName=$_GET['branchname'];
   $pharmacyID=$_SESSION['id'];
  
	
    $pharmacy_Admin= new Pharmacy_Admin();
    if($City==" " || $Zone=="" || $Address=="" || $Phone=="" || $GoogleURL=="" ||$BranchName =="" ){
        $_SESSION['error']="incomplete data";
		echo $_SESSION['error'];
        header("location: AddNewBranch.php");
    }
    else{
    $inserteddata= $pharmacy_Admin->Add_Pharmacy_Branch($BranchName,$pharmacyID,$City,$Zone,$Address,$Phone,$GoogleURL);
	//echo  $inserteddata;
	$_SESSION['sucess']="Branch Added to your pharmacy list sucessfully ";
   echo $_SESSION['sucess'];
      header("location: PharmacyBranches.php");
  
   
    }
    
}