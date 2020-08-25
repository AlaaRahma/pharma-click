<?php
session_start();
include_once '../BusinessLogic/Cart.php';
include_once '../BusinessLogic/Order.php';
$cart=new Cart();
$order= new Order();
$patientId=$_SESSION['id'];
$cartOrder=$cart->ViewCart($patientId);
if($_POST['diff_city']==0) {
    
   $city=$_SESSION['city_id'];
}
else {
$city=$_POST['diff_city'];
} 
if ($_POST['diff_zone']==0){
    $zone=$_SESSION['zone_id'];
}
else {
$zone=$_POST['diff_zone'];
} 
if($_POST['diff_address']==""){
    $street=$_SESSION['address'];
}
else {
$street=$_POST['diff_address'];
}
if ($_POST['diff_phone']==0) {
    $phoneNume=$_SESSION['phone_num'];
} 
else {
$phoneNum=$_POST['diff_phone'];
}

$placedOrder=$order->InsertOrder($patientId,$city, $zone, $street, $phoneNum);
$orderId=$order->GetOrderId($patientId);
$OrderDrugs=$order->InsertOrderDrugs($orderId,$cartOrder);
$DeleteCart=$cart->DeleteCartOrder($patientId);
if ($OrderDrugs&&$placedOrder&&$cartOrder&&$DeleteCart) {
    header("location:MyOrders.php");
}

?>


