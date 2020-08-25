
<!doctype html>
<html lang="en">
<?php
 include_once '../BusinessLogic/Pharmacy_Admin.php';
?>

<body>


<!-- TOP HEADER Start
    ================================================== -->
	<?php include('header.php');?>

	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>Add New Product </h1>
					
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="">Pharmacy Admin</a></li>
					  	<li class="active">Add New Product</li>
					</ol>
				</div>	<!-- End of /.col-md-8 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of /#Topic-header -->
	
		<section id="shop">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="products-heading">
					
					</div>	<!-- End of /.Products-heading -->
					
					<!-- Form Start
    ================================================== -->
	 <form action="AddPharmacyDrug.php" method="GET">
               
<?php 
$id=$_SESSION['id'];

$durgname = new Pharmacy_Admin();
$result= $durgname->Pharmacy_product_list($id);

	?>
						

                <div class="row"> 
                    <div class="col-lg-12">
                <div class="form-group">
				<?php 
					 $no_of_rows = mysqli_num_rows($result);
		 if ($no_of_rows >0)
		 { 
	   ?>
		
                    <label for="drug">Drug Name:</label>
                    <select  class="form-control" name="drug" id="drug">
					<?php while  ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		 {
			 ?>

                        <option name ="drugname" value="<?php echo $row["drug_id"];?> "  id =""> <?php echo $row["Drug_Name"];?> </option> 
                       
                        <br/>
							 <?php } ?>
                    </select>  
                </div>
		 <?php } ?>
                    </div>
					      <br/> 
                    <div class="col-lg-12">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Enter your quantity" name="quantity"  value="">
                </div>
                    </div>
                     <br/> <br/>
               
                
                   
                   
                </div>
                
                         
                <button type="submit" class="btn btn-primary" > Add  </button>
                <br/> <br/>
                    
            </form>
	
					</div>	<!-- End of /.col-md-9 -->
			
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->
	
	<!-- FOOTER Start
    ================================================== -->
<?php include('footer.php'); ?>

</body>
</html>