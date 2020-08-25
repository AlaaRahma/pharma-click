   
<?php
 include_once '../BusinessLogic/Pharmacy_Admin.php';

$id=$_SESSION['id'];

$Order= new Pharmacy_Admin();
$result= $Order->PharmacyOrders($id);

 $no_of_rows = mysqli_num_rows($result);
?>
     <div class="table-responsive table-responsive-data2 ">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Order ID</th>
                                                <th>Patient Name</th>
                                                <th>Order status</th>									
												 
                                                <th></th>
                                            </tr>
                                        </thead>
													<?php 
													if ($no_of_rows >0)
													{
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                
                                                <td><a href ='ViewOrderDetails.php?orderid=<?php echo $row["order_id"];?>& patientId=<?php echo $row["patient_id"];?>'><?php echo $row["order_id"]; ?></a></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row["First_name"]; ?></span>
                                                </td>
                                                <td class="desc"><?php echo $row["status"]; ?></td>
                                             
                                             
                                            </tr>
											
                                            <tr class="spacer"></tr>
                                        	 <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>