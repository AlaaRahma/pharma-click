<?php
 include_once '../BusinessLogic/drug.php';
 include_once '../BusinessLogic/Cart.php';
 $cart= new Cart();
if (isset($_GET['id']))
 {
 // get id value
 $drug_id = $_GET['id'];
 //echo $id;
$phramid =$_GET['phramid'];
 }

$productinfo = new drug();


$result= $productinfo->View_drug_info($drug_id,$phramid);



                     foreach ($result as $row )
{
	
?>
<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
                                            <img src="<?php echo $row["image_path"]; ?>" width="450px" alt="">
					</div>

				</div> <!-- End of /.col-md-5 -->
<div class="col-md-4">
					<div class="block">
						<div class="product-des">


							<h4>Name:<?php echo $row["Drug_Name"]; ?></h4>
							<p class="price"> price :<?php echo  $row["price"]; ?></p>
							<p>Description  :<?php echo  $row["Desc"]; ?></p>
							<p> prescription :<?php echo  $row["prescription"]; ?></p>
							<p> deprecated_drugs:<?php echo  $row["deprecated_drugs"]; ?></p>
							<p>ingredient_name: <?php echo $row["Name"]; ?></p>
							<p> cat_Name:<?php echo  $row["cat_Name"]; ?></p>
							<p> sub-cat:<?php echo  $row["Sub_Name"]; ?></p>
							<p> form :<?php echo  $row["form_type"]; ?></p>
							<p> company name:<?php echo  $row["company_name"]; ?></p>
							
							<a href='Pharmacy_Product_List.php?id= <?php echo $row["User_id"];?>'>
							<p>  pharmacy name: <?php echo $row["First_name"];  ?></p>
						</a>
						
						
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



						</div>	<!-- End of /.product-des -->
					</div> <!-- End of /.block -->
				</div>	<!-- End of /.col-md-4 -->	
<?php   }?>