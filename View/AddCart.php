<?php
session_start();
 include_once '../BusinessLogic/Cart.php';
 //Add to cart button 
 $newCart= new Cart();
 $drgId=$_GET['id'];
 $phId=$_GET['phId'];
 if(isset($_SESSION['id'])) {
 $AddCart=$newCart->InsertCart($drgId,$phId,$_SESSION['id']);
 } 
 if($AddCart) {
     header("location:cartView.php");
 }
?>

