<?php
session_start();
include '../BusinessLogic/Pharmacy_Admin.php';
if (isset($_GET['orderId']))
 {
 $orderId=$_GET['orderId'];
 

$patientId=$_GET['patientId'];

$status=$_GET['Status'];
 //var_dump($status);
		
        $PharmAdmin= new Pharmacy_Admin();
        $update_status=$PharmAdmin->UpdatePharmOrderStatus($orderId, $patientId,$status);
       
	   if ($update_status){
		   
 header("location: PharmacyOrders.php");
        }
        else {
           echo 3 ; 
        }
 }
?>
