<?php 
session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';
  include_once '../BusinessLogic/Admin.php';
 include_once '../BusinessLogic/drug.php';

  

    $ProductName=$_GET['productname'];
    $prescription=$_GET['prescription'];
	$deprecated_drugs=$_GET['deprecated_drugs'];
	 $price=$_GET['price'];
    $Desc=$_GET['Desc'];
	$Category=$_GET['Category'];
	 $Sub=$_GET['Sub-Category'];
    $Ingredients=$_GET['Ingredients'];
	$Company=$_GET['Company'];
	 $Form=$_GET['Form'];
    $tags=$_GET['tags'];
	$fileToUpload=$_GET['fileToUpload'];
	$target_path="images/".$fileToUpload;
move_uploaded_file ( $fileToUpload , $target_path );
	
	
/*            $temp='tmp.jpg';                   
$target_dir = "images/product images/";
$target_file = $target_dir .$fileToUpload;;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$tempname="images/product images/".$temp;
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($tempname, $target_file)) {
    echo "The file ". $fileToUpload. " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
	    */
        
 
    $Admin= new Admin();
	
    if($ProductName==" " || $prescription=="" || $deprecated_drugs=="" || $price=="" ||$Desc=="" ){
        $_SESSION['error']="incomplete data";
		echo $_SESSION['error'];
        header("location: AddDrugForm.php");
    }
    else{
		
    $drugtable= $Admin->Add_New_Drug($ProductName,$prescription,$deprecated_drugs,$price,$target_path,$Desc,$Category, $Sub, $Ingredients,$Company,$Form,$tags);

	$_SESSION['sucess']="Drug Added to  list sucessfully ";
   echo $_SESSION['sucess'];
      header("location: ProductAdminTable.php");
  
   
    }
    
