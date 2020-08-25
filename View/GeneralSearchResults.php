<!DOCTYPE html>
<html lang="en">
   <?php
session_start();
include_once 'header.php';
include_once '../BusinessLogic/User.php';

?>
<section id="products">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="products-heading">
						<h2>Search results </h2>
					</div>
				</div>
			</div>
                    <?php 
                                if (isset ($_POST['searchLoc'])) {
    $user=new User();
    $location=$_POST['searchLoc'];
    $searchLocResult=$user->searchBylocation($location);
    
                    foreach($searchLocResult as $row )
{
 ?>
<div class="col-md-3">
					<div class="products">
						<a href="single-product.php?id=<?php echo $row["drug_id"];?> &phramid= <?php echo $row["pharmacy_id"]; ?> ">
							<img src="<?php echo $row['image_path']; ?>" alt="">
						</a>
						<a href='single-product.php?id=<?php echo $row["drug_id"];?> &phramid= <?php echo $row["pharmacy_id"];?>'>
							<h4><?php echo $row["Drug_Name"]; ?></h4>
						</a>

							
                                                
					
						<p class="price"><?php echo $row["price"]."EGP"; ?></p>
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
													$phramid=$id ;
                                               
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
                
		


<?php  }
} 

if (isset($_POST['search'])) {
  
    $searchAll = new User();

$searchItem=$_POST['search'];

$search_result= $searchAll->General_search($searchItem);

 foreach($search_result as $row )
{
 ?>
<div class="col-md-3">
					<div class="products">
						<a href="single-product.php?id=<?php echo $row["drug_id"];?> &phramid= <?php echo $row["pharmacy_id"]; ?> ">
							<img src="<?php echo $row['image_path']; ?>" alt="">
						</a>
						<a href='single-product.php?id=<?php echo $row["drug_id"];?> &phramid= <?php echo $row["pharmacy_id"];?>'>
							<h4><?php echo $row["Drug_Name"]; ?></h4>
						</a>

							
                                                     
					
						<p class="price"><?php echo $row["price"]."EGP"; ?></p>
					<?php 
						if ((isset($_SESSION['id']))&&$_SESSION['user_type']==3)
							{ ?>
					 <a class="view-link shutter" href="AddCart.php?id=<?php echo $row["drug_id"];?>">
						<i class="fa fa-plus-circle"></i>Add To Cart</a>
						 <?php }
						 ?>

					</div>	<!-- End of /.products -->
				</div> <!-- End Of Col-md-3 -->
           
		


<?php  }
} 
   ?>

     </div>
</section>


<?php 
include_once 'footer.php';
?>

</html>

