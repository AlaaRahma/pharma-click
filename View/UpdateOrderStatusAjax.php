<?php
session_start();
include '../BusinessLogic/Admin.php';
if (isset($_SESSION['id'])) {
    if(isset($_POST['OrderId'])){
        $orderId=$_POST['OrderId'];
        $patientId=$_POST['PatientId'];
        $status=$_POST['Status'];
        $Admin= new Admin();
        $update_status=$Admin->UpdateOrderStatus($orderId, $patientId, $status);
        if ($update_status){
            ob_clean();
         echo '1';
        }
        else {
            ob_clean();
            echo '0';
        }
    }
    
    
    
    
    
    
    
    
}













?>

