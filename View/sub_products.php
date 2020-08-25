
<?php
 include_once '../BusinessLogic/drug.php';

//$catid=$_SESSION['id'];
if (isset($_GET['id']))
 {
 // get id value

 $subid=$_GET['id'];
// echo $catid;
 }
$subProducts = new drug();
$result= $subProducts->Sub_Products($subid);
  $no_of_rows = mysqli_num_rows($result);
		 if ($no_of_rows >0){
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>
<div class="col-md-3">
					<div class="products">
						<a href="single-product.php?id=<?php echo $row["drug_id"];?> &phramid= <?php echo $row['User_id'] ; ?> ">
							<img src="<?php echo $row["image_path"];?>" alt="">
						</a>
						<a href='single-product.php?id=<?php echo  $row["drug_id"];?> &phramid= <?php echo $row['User_id'];?>'>
							<h4><?php echo  $row["Drug_Name"]; ?></h4>
						</a>
					
						<p class="price"><?php   echo $row["price"]; ?></p>
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
				
				
<?php 
}
		 }
?>