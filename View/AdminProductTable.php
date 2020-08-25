   
<?php
 include_once '../BusinessLogic/Admin.php';


$productinfo = new Admin();
$result= $productinfo->ProductList();
  
 $no_of_rows = mysqli_num_rows($result);
?>

   <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                  <a href="AddnewDrug.php">
                                    <button class="au-btn au-btn-icon au-btn--blue" >
                                        <i class="zmdi zmdi-plus"></i>add product</button></a>
                                </div>
                            </div>
                        </div>
			
					
						</div>

     <div class="table-responsive table-responsive-data2 ">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Product ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Sub-Category</th>
                                                <th>Price</th>
                                                <th>Company Name</th>
												</br>
												</br>
												<!-- <th>Options</th>-->
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
                                                
                                                <td><?php echo $row["drug_id"]; ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row["Drug_Name"]; ?></span>
                                                </td>
                                                <td class="desc"><?php echo $row["cat_Name"]; ?></td>
                                                <td><?php echo $row["Sub_Name"]; ?></td>
                                                <td>
                                                    <span class="status--process"><?php echo $row["price"]; ?></span>
                                                </td>
                                                <td><?php echo $row["company_name"]; ?></td>
                                            <!-- <td>
                                                    <div class="table-data-feature">
                                                     
														<form  action="DeleteDrug.php" method="post">
                                                        <button class="item" type="submit">
                                                            <i class="zmdi zmdi-delete"></i>
															<input type="hidden" name="drug_id" id="drug_id" value="<?php echo $row['drug_id'];?>">
                                                        </button>
                                                     </form>
                                                    </div>
                                                </td>--->
                                            </tr>
											
                                            <tr class="spacer"></tr>
                                        	 <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
								
                                <!-- END DATA TABLE -->
                            </div>
