<?php

//new_feature
session_start();
include_once '../BusinessLogic/Order.php';
$order= new Order ();
$orderId=$_GET['orderId'];
$deleteOrder=$order->DeleteOrder($orderId);
var_dump($deleteOrder);
if($deleteOrder) {
    header("location:AdminOrderDrugs.php");
}

?>
