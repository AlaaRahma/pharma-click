   
<?php
 include_once '../BusinessLogic/Pharmacy_Admin.php';

$id=$_SESSION['id'];

$productlist= new Pharmacy_Admin();
$result= $productlist->PharmacyProducts($id);

 $no_of_rows = mysqli_num_rows($result);
?>
     <div class="table-responsive table-responsive-data2 ">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Product ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Sub-Category</th>
                                                <th>Price</th>
												<th>Qunatity</th>
                                                <th>Company Name</th>
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
                                                
                                                <td><?php echo $row["drug_id"]; ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row["Drug_Name"]; ?></span>
                                                </td>
                                                <td class="desc"><?php echo $row["cat_Name"]; ?></td>
                                                <td><?php echo $row["Sub_Name"]; ?></td>
                                                <td>
                                                    <span class="status--process"><?php echo $row["price"]; ?> EGP</span>
                                                </td>
												 <td><?php echo $row["quantity"]; ?></td>
                                                <td><?php echo $row["company_name"]; ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                      
                                                       <a href="PharmacyEditProduct.php?product_id=<?php echo $row["drug_id"];?>">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
														<a>
                                                        <form  action="DeleteProduct.php" method="post">
                                                        <button class="item" type="submit">
                                                            <i class="zmdi zmdi-delete"></i>
															<input type="hidden" name="drug_id" id="drug_id" value="<?php echo $row['drug_id'];?>">
															<input type="hidden" name="pharma_id" id="pharma_id" value="<?php echo $id;?>">
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