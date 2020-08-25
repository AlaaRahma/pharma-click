   
<?php
 include_once '../BusinessLogic/Pharmacy_Admin.php';

$id=$_SESSION['id'];

$offerlist= new Pharmacy_Admin();
$result= $offerlist->PharmacyOffers($id);

 $no_of_rows = mysqli_num_rows($result);
?>
     <div class="table-responsive table-responsive-data2 ">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Offer ID</th>
                                                <th>Product Name</th>
                                                <th>Old Price</th>
                                                <th>Offer Price </th>
                                                <th>Qunatity</th>
                                                <th>Dsc</th>
												<th>Offer Type</th>
												<th>Time From</th>
												<th>Time To</th>
												</br>
												</br>
												 <th>Options</th>
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
                                                
                                                <td><?php echo $row["offer_id"]; ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row["Drug_Name"]; ?></span>
                                                </td>
                                                <td class="desc"><?php echo $row["price"]; ?> EGP</td>
                                                <td><?php echo $row["newprice"]; ?> EGP</td>
                                                <td>
                                                    <span class="status--process"><?php echo $row["quantity"]; ?></span>
                                                </td>
                                                <td><?php echo $row["description"]; ?></td>
												  <td><?php echo $row["type_name"]; ?></td>
												    <td><?php echo $row["time_from"]; ?></td>
													    <td><?php echo $row["time_to"]; ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                      
                                                       <a href="Edit_Offer.php?offer_id=<?php echo $row["offer_id"];?>">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
														<a>
                                                      <form  action="DeleteOffer.php" method="post">
                                                        <button class="item" type="submit">
                                                            <i class="zmdi zmdi-delete"></i>
															<input type="hidden" name="offer_id" id="offer_id" value="<?php echo $row['offer_id'];?>">
                                                        </button>
                                                     </form>
                                                     
                                                    </div>
                                                </td>
                                            </tr>
											
                                            <tr class="spacer"></tr>
                                        	 <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>