
<!DOCTYPE html>
<html lang="en">
   <?php
include_once 'header.php';
  include('PhrmaStyle.php');
include_once '../BusinessLogic/Order.php';
include_once '../BusinessLogic/Address.php';
include_once '../BusinessLogic/Pharmacy_Admin.php';
$pharmacyId=$_SESSION['id'];
if (isset($_GET['orderid']))
 {
 // get id value
 $orderId = $_GET['orderid'];
 

$patientId =$_GET['patientId']; 

 }

$Address= new Address();
$orderPatientAddress=$Address->GetPatientAddress($patientId);
$parhmOrder= new Pharmacy_Admin();
 $OrdersDrug=$parhmOrder->OrderPharmaDetails($orderId,$patientId);
   

 $GetOrders=$parhmOrder->OrderPharma($orderId,$pharmacyId,$patientId);

 
 
 $orderCount=$parhmOrder->OrderCounts($orderId );
$patientOrder= new Order();
    $address=$patientOrder->GetOrderAddress($orderId,$patientId);
if(!isset($_SESSION['id'])) {
    header("location:");
}
?>

<div class="container" id="containerD">
 <?php
 //update 
 
 $orderTotal=0;
 

 ?>
<div class="container" id="myorderD"> 
   
    <div class="row" id="details"> 
            <div class="col-lg-6 col-sm-5">
     <?php 
		 		   

 $no_of_rows2 = mysqli_num_rows($GetOrders);
		 if ($no_of_rows2 >0)
		 {
while ($row2 = mysqli_fetch_array($GetOrders, MYSQLI_ASSOC))
{
	?>
         
<br> </p> 
            </div>
            <div class="col-lg-6 col-sm-5">
                <p style="color: black" >   <b>Recipient: </b><?php 
                echo $_SESSION['name']." ".$_SESSION['lastName'];?><br> </p>
             <p style="color: black" >   <b>payment method:</b> Cash On Delivery (COD) <br> </p>
           
            </div>
        </div>

    <div id="drugs" >
    <div class="row" >
         
            <div class="col-lg-6">
              
                <img  src="<?php echo $row2['image_path']; ?>"/>
            </div>
            <div class=" border col-lg-6" id="orderD">
                <p><b>Drug Name:</b><?php echo $row2['drug_name']; ?></p>
                <p><b>Pharmacy:</b> <?php echo $row2['pharmacy_name']; ?> </p>
                 <p><b>Quantity:</b> <?php echo $row2['quantity']; ?> </p>
                  <p><b>Total Price:</b> <?php echo $row2['totalPrice']; ?></p>
                
            </div>
           
        </div>
        </div>
		     <?php 
		 } 
		 }
                ?>
			  

    <?php        $no_of_rows = mysqli_num_rows($OrdersDrug); 
		 if ($no_of_rows >0)
		 {
while ($row = mysqli_fetch_array($OrdersDrug, MYSQLI_ASSOC))
{
                
   ?>
     <p style="color: black" >   <b>Order placed on: </b> <?php echo $row['date'];?><br> </p>
              <p style="color: black" >   <b>Order Status:  </b> <?php echo $row['status'];?><br> </p>
              <p style="color: black" >   <b>Address:</b><?php if($row['new_address']==""){
           echo " ".$orderPatientAddress[0]['City']."-".$orderPatientAddress[0]['Zone']."-".$orderPatientAddress[0]['address']; }
           else {
         echo $row['cityname']; echo $row['zonename'];  echo $row['new_address']; } ?> <br> </p> 
                <p style="color: black" > <b>phone number:</b> <?php if ($row['new_phoneNum']==0)
                echo " ".$_SESSION['phone_num'];
                else {
                    echo $row['new_phoneNume'];
				}
?>

    <!--Update button -->
	<div class ="row">
    <div class="  btn btn-sm">
        <form action="DeletePharmOrder.php" method="post">
            <input type="hidden" name="orderId" id="orderId"value="<?php 
            echo $row['order_id'];
            ?>">
			
            <button class="btn-danger form-control " type="submit" 
			<?php
            if ($row['status']=='out for delivery'||$row['status']=='Delivered')
			{ echo 'Disabled';
		
			}
			
			
            ?> >
            
            Delete Order
        </button>
        </form>
		<?php         
$status=$row['status'];		
		$no_of_rows1 = mysqli_num_rows($orderCount);


		 if ($no_of_rows1 >0)
		 {
while ($row1 = mysqli_fetch_array($orderCount, MYSQLI_ASSOC))
	
{ 
          if ($row1['count']==1)
		  {
?>
	 <form action="UpdatePharmOrderStatusAjax.php" method="GET">
		
            <?php
            if ($status=='ready for shipping')
			{ 
			?> 
		<div class="col-12 col-md-12">
	<div class="col-12 col-md-12">
		<p> <b> You Need to contact Patient before Change Status :  </b></p>
		</div>
			
            <input type="hidden" name="orderId" id="orderId"value="<?php 
            echo $orderId;?>">
			 <input type="hidden" name="patientId" id="patientId"value="<?php 
            echo $patientId;?>">
		
			 <input type="hidden" name="Status" id="Status"value="<?php 
            echo 2;
            ?>">
			<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                 
                                    <button class="au-btn au-btn-icon au-btn--blue" type ="submit" >
                                      Status</button>
                                </div>
                            </div>
                        </div>
        
												</div>
			
			
     <?php      
			} 
			else if ($status=='out for delivery')
			{
			
				?>
		<div class="col-12 col-md-12">
	<div class="col-12 col-md-12">
		<p> <b> Change Order Status  press Button Status:  </b></p>
		</div>
			
            <input type="hidden" name="orderId" id="orderId"value="<?php 
            echo $orderId;?>">
			 <input type="hidden" name="patientId" id="patientId"value="<?php 
            echo $patientId;?>">
		
			 <input type="hidden" name="Status" id="Status"value="<?php 
            echo 3 ;
            ?>">
			<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                 
                                    <button class="au-btn au-btn-icon au-btn--blue" type ="submit" >
                                      Status</button>
                                </div>
                            </div>
                        </div>
        
												</div>
		<?php	}
			else { 
			?>
		<input type="hidden" name="StatusID" id="StatusID"value="StatusID">
			
            <button  class="btn-danger form-control" type ="submit"<?php if ($status=='Delivered')
			{ 
		echo 'Disabled';
		
			}
			            ?> >
            Already Delivered 
			 
        </button>
		  <?php }
		  ?> 
        </form>
		<?php 
}
else {
	?>
	<button class="btn-danger form-control " type="submit"  disabled 
			 >
			 You Cannot Change this Order Admin Will Contact With You 
	<?php
}
 }
		 }
}
		 }
 ?>
    </div>
	</div>
</div> 

</div>

<?php 
include_once 'footer.php';
?>

</html>


