
<?php
 include_once '../BusinessLogic/drug.php';

//drug information 
$offerlist = new drug();



$result= $offerlist->View_Offers();
    $no_of_rows = mysqli_num_rows($result);
		 if ($no_of_rows >0){
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{


?>

<div class="col-md-3">
					<div class="products">
						<a href="OfferSingleProduct.php?id=<?php echo $row["drug_id"];?> &phramid= <?php echo $row["User_id"]; ?> ">
							<img src="<?php echo $row["image_path"];?>" alt="">
						</a>
						<a href='OfferSingleProduct.php?id=<?php echo $row["drug_id"];?> &phramid= <?php echo $row["User_id"];?>'>
							<h4><?php echo $row["Drug_Name"]; ?></h4>
						</a>

							
                                                     
					
						<b class="price">
						Old <?php echo $row['price']; ?>  EGP 
						-New <?php echo $row['newprice']; ?> EGP </b>
							<?php  if (!(isset($_SESSION['id'])))
						 {
						 ?>
						 <a class="text-primary view-link shutter " data-toggle="modal" data-target="#loginModal" href="#""> 
                                                   
                                                <i class="fa fa-plus-circle"></i>Add To Cart</a>
							<?php 
} elseif ($_SESSION['user_type']==3)
							{ ?>
						
					  <?php
                                                     $patientId=$_SESSION['id'];
                                               $drug_id=$row["drug_id"];
											   $phramid=$row["User_id"];
                                                    $checkCart=$cart->DisableAdd($drug_id,$patientId, $phramid);
                                                if ($checkCart) {
                                                    echo '<span class="label label-success">Already added</span>';
                                                }
                                                else {
                                                    ?>
                          
						<a class="text-primary view-link shutter " href="AddCart.php?id=<?php echo $drug_id;?>&phId=<?php echo $phramid; 
                                                ?> "> 
                                                   
                                                <i class="fa fa-plus-circle"></i>Add To Cart</a>
						 <?php }
					 } ?>


					</div>	<!-- End of /.products -->
				</div> <!-- End Of Col-md-3 -->
				
				


<?php  }} ?>

