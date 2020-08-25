
<!DOCTYPE html>
<html lang="en">
   <?php
session_start();
include_once 'header.php';
include_once '../BusinessLogic/Order.php';
include_once '../BusinessLogic/Address.php';
$patientId=$_SESSION['id'];
$Reciptient=$_SESSION['email'];
$Address= new Address();
$orderPatientAddress=$Address->GetPatientAddress($patientId);
$patientOrder= new Order();
 $GetOrders=$patientOrder->OrderDetails($patientId);
if(!isset($_SESSION['id'])) {
    header("location:");
}
?>

<div class="container" id="containerD">
 <?php
 //update 
 if(count($GetOrders)==0) {
     echo '<div class="alert alert-warning">'
    . 'You did Not place any Order yet!</div>';
 }
 else {
 $orderTotal=0;
 foreach ($GetOrders as $order) {
    $orderId=$order['order_id'];
    $address=$patientOrder->GetOrderAddress($orderId,$patientId);

 ?>
<div class="container" id="myorderD"> 
   
    <div class="row" id="details"> 
            <div class="col-lg-6 col-sm-5">
                <p style="color: black" >   <b>Order placed on: </b> <?php echo " ".$order['date'];?><br> </p>
              <p style="color: black" >   <b>Order Status:  </b> <?php echo " ".$order['status'];?><br> </p>
              <p style="color: black" >   <b>Address:</b><?php if($order['new_address']==""){
           echo " ".$orderPatientAddress[0]['City']."-".$orderPatientAddress[0]['Zone']."-".$orderPatientAddress[0]['address']; }
           else {
         echo " ".$address[0]['City']."-".$address[0]['Zone']."-".$address[0]['new_address']; } ?> <br> </p> 
                <p style="color: black" > <b>phone number:</b> <?php if ($GetOrders['new_phoneNum']==0)
                echo " ".$_SESSION['phone_num'];
                else {
                    echo $GetOrders['new_phoneNume'];
                }
?><br> </p> 
            </div>
            <div class="col-lg-6 col-sm-5">
                <p style="color: black" >   <b>Recipient: </b><?php 
                echo $_SESSION['name']." ".$_SESSION['lastName'];?><br> </p>
             <p style="color: black" >   <b>payment method:</b> Cash On Delivery (COD) <br> </p>
               <p style="color: black" >   <b>Total Price:</b> <?php ?><br> </p>  
            </div>
        </div>

    <div id="drugs" >
    <div class="row" >
          <?php 
                $orderDrug= $patientOrder->OrderDrugDetails($orderId, $patientId);
                
                foreach ($orderDrug as $Drug) {
                    $orderTotal=$orderTotal+$Drug['totalPrice']
                ?>
            <div class="col-lg-6">
              
                <img width="60" height="60" src="<?php echo$Drug['image_path']; ?>"/>
            </div>
            <div class=" border col-lg-6" id="orderD">
                <p><b>Drug Name:</b><?=" ".$Drug['drug_name']?></p>
                <p><b>Pharmacy:</b> <?= " ".$Drug['pharmacy_name']?> </p>
                 <p><b>Quantity:</b> <?= " ".$Drug['quantity']?> </p>
                  <p><b>Total Price:</b> <?= " ".$Drug['totalPrice']?> </p>
                
            </div>
                <?php 
                }
                ?>
        </div>
        </div>
    <!--Update button -->
    <div class="  btn btn-sm">
        <form action="DeleteOrder.php" method="post">
            <input type="hidden" name="orderId" id="orderId"value="<?php 
            echo $order['order_id'];
            ?>">
            <button class="btn-danger form-control " type="submit" <?php
            if ($order['status']!='ready for shipping')
                echo 'Disabled';
            ?>
            >
            Delete Order
        </button>
        </form>
    </div>
</div> 
<?php 
 }
 }
 ?>
</div>

<?php 
include_once 'footer.php';
?>

</html>
