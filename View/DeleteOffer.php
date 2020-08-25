a<?php

session_start();
include_once '../BusinessLogic/Pharmacy_Admin.php';
$offer_id=$_POST['offer_id'];


$offer=new Pharmacy_Admin();

$DeleteOffer= $offer->DeleteOffer($offer_id);
if($DeleteOffer){
header("location:PharmacyOffers.php");
}
    
