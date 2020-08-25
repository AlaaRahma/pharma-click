
<!doctype html>
<html lang="en">
<?php
 include_once '../BusinessLogic/drug.php';
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
					<h1>Add Offer </h1>
					
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="pharmcyAdmin.php">Phamrcy Admin</a></li>
					  	<li class="active">Add Offer</li>
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
	 <form action="OfferAddToPharmacy.php" method="GET">
               
<?php 
$id=$_SESSION['id'];

$durgname = new Pharmacy_Admin();
$result1= $durgname->PharmacyProducts($id);
 $no_of_rows1 = mysqli_num_rows($result1);
	?>
						

                <div class="row"> 
                    <div class="col-lg-6">
                <div class="form-group">
				<?php 
					
		 if ($no_of_rows1 >0)
		 { 
	   ?>
		
                    <label for="drug">Drug Name:</label>
                    <select  class="form-control" name="drug" id="drug">
					<?php while  ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
		 {
			 ?>

                        <option name ="drugname" value="<?php echo $row["drug_id"];?> "  id =""> <?php echo $row["Drug_Name"];?> </option> 
                       
                        <br/>
							 <?php } ?>
                    </select>  
                </div>
		 <?php } ?>
                    </div>
					     
                
						           <div class="col-lg-6">
                <div class="form-group">
				<?php 
				$offertype = new Pharmacy_Admin();
$result= $offertype->Get_Offers_type();
					 $no_of_rows = mysqli_num_rows($result);
		 if ($no_of_rows >0)
		 { 
	   ?>
		
                    <label for="offer">Offer Type:</label>
                    <select  class="form-control" name="offer" id="offer">
					<?php while  ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		 {
			 ?>

                        <option name ="offertype" value="<?php echo $row["type_id"];?> "  id =""> <?php echo $row["type_name"];?> </option> 
                       
                        <br/>
							 <?php } ?>
                    </select>  
                </div>
		 <?php } ?>
                    </div>
					
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Enter your quantity" name="quantity"  value="">
                </div>
                    </div>
                     <br/> <br/>
               
                
                   
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="price">  New Price: </label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter your price" value=""  /> 
                </div> 
                    </div>
                </div>
				
				
                
					   <div class="col-lg-12">
                <div class="form-group">
                    <label for="dsc">Description:</label>
                    <input type="data" class="form-control" id="dsc" placeholder="Enter your Description" name="dsc"  value="">
                </div>
                    </div>
                     <br/> <br/>
                         
						  <div class="col-lg-6">
                <div class="form-group">
                    <label for="timefrom">Time From:</label>
                    <input type="date" class="form-control" id="timefrom" placeholder="Enter Offer Start time" name="timefrom"  value="">
                </div>
                    </div>
                   
					  <div class="col-lg-6">
                <div class="form-group">
                    <label for="timeto">Time To:</label>
                    <input type="date" class="form-control" id="timeto" placeholder="Enter Offer End time" name="timeto"  value="">
                </div>
                    </div>
                     <br/> <br/>
				
					 
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