   
<?php
 include_once '../BusinessLogic/Pharmacy_Admin.php';

$id=$_SESSION['id'];

$productlist= new Pharmacy_Admin();
$result= $productlist->PharmacyBranches($id);

 $no_of_rows = mysqli_num_rows($result);
?>
     <div class="table-responsive table-responsive-data2 ">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Branch ID </th>
                                                <th>Branch Name </th>
                                                <th>City </th>
                                                <th>Zone</th>
                                                <th>Address</th>
												<th>Google URl </th>
                                                <th> Branch Phone</th>
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
                                                
                                                <td><?php echo $row["branch_id"]; ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row["branch_name"]; ?></span>
                                                </td>
                                                <td class="desc"><?php echo $row["cityname"]; ?></td>
                                                <td><?php echo $row["zonename"]; ?></td>
                                                <td>
                                                    <span class="status--process"><?php echo $row["address"]; ?> </span>
                                                </td>
												  <td><?php echo $row["branch_url"]; ?></td>
												 <td><?php echo $row["phone"]; ?></td>
                                              
                                                <td>
                                                    <div class="table-data-feature">
                                                      
<!--                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>-->
<form  action="DeleteBranch.php" method="post">
                                                        <button class="item" type="submit">
                                                            <i class="zmdi zmdi-delete"></i>
															<input type="hidden" name="branch_id" id="branch_id" value="<?php echo $row['branch_id'];?>">
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