<?php

include_once '../BusinessLogic/Cart.php';
if(isset($_POST['drugId'])){
     $drugId=$_POST['drugId'];
     $patientId=$_POST['patientId'];
     $pharamacyId=$_POST['pharamacyId'];
     $quantity=$_POST['quantity'];
     $cart= new Cart();
     $return=$cart->UpdateQuantity($quantity, $patientId, $drugId,$pharamacyId);
     if($return){
         ob_clean();
         echo '1';
     }
     
}
