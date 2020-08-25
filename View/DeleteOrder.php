<?php
//new_feature
session_start();
include_once '../BusinessLogic/Order.php';
$order= new Order ();
$orderId=$_POST['orderId'];
$deleteOrder=$order->DeleteOrder($orderId);
$deleteDrugs=$order->DeleteOrderDrug($orderId);
if($deleteOrder&&$deleteDrugs) {
    header("location:MyOrders.php");
}

?>

