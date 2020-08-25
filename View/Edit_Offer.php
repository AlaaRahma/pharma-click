
<!doctype html>
<html lang="en">
<?php
 include_once '../BusinessLogic/drug.php';
  include_once '../BusinessLogic/Pharmacy_Admin.php';

?>

<body>


<!-- TOP HEADER Start
    ================================================== -->
	<?php include('header.php');
	if (isset($_GET['offer_id']))
 { $offerid = $_GET['offer_id'];
 }?>

	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>Edit Offer </h1>
					
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="">Phamrcy Admin</a></li>
					  	<li class="active">Edit Offer</li>
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
	 <form action="OfferEditToPharmacy.php?offerid=<?php echo $offerid;?>" method="post">
               
<?php 

 
$id=$_SESSION['id'];

$offer = new Pharmacy_Admin();
$result2=$offer->getofferdata($offerid);

$no_of_rows2 = mysqli_num_rows($result2);
if ($no_of_rows2 >0)
		 { 
	 while  ($row3 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
	 {

	?>
						

                <div class="row"> 
                    <div class="col-lg-6">
                <div class="form-group">
			 
					
		
		
                    <label for="drug">Drug Name:</label>
                    <select  class="form-control" name="drug" id="drug" disabled>
			

                        <option name ="drugname" value="<?php echo $row3["drug_id"];?> "  id =""> <?php echo $row3["Drug_Name"];?> 
                     
							  
                        <br/>
							
                    </select>  
                </div>
		 
                    </div>
					     
                
						           <div class="col-lg-6">
                <div class="form-group">
	
                    <label for="offer">Offer Type:</label>
                    <select  class="form-control" name="offer" id="offer" disabled>
			

                        <option name ="offertype" value="<?php echo $row3["type_id"];?> "  id =""> <?php echo $row3["type_name"];?> </option> 
                       
                        <br/>
						
                    </select>  
                </div>
		
                    </div>
					
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Enter your quantity" name="quantity"  value="<?php echo $row3["quantity"];?>">
                </div>
                    </div>
                     <br/> <br/>
               
                
                   
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="price">  New Price: </label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter your price" value="<?php echo $row3["newprice"];?>"  /> 
                </div> 
                    </div>
                </div>
				
				
                
					   <div class="col-lg-12">
                <div class="form-group">
                    <label for="dsc">Description:</label>
                    <input type="text" class="form-control" id="dsc" placeholder="Enter your Description" name="dsc"  value="<?php echo $row3["description"];?>">
                </div>
                    </div>
                     <br/> <br/>
                         
						  <div class="col-lg-6">
                <div class="form-group">
                    <label for="timefrom">Time From:</label>
                    <input type="date" class="form-control" id="timefrom" placeholder="Enter Offer Start time" name="timefrom"  value="<?php echo $row3["time_from"];?>">
                </div>
                    </div>
                   
					  <div class="col-lg-6">
                <div class="form-group">
                    <label for="timeto">Time To:</label>
                    <input type="date" class="form-control" id="timeto" placeholder="Enter Offer End time" name="timeto"  value="<?php echo $row3["time_to"];?>">
                </div>
                    </div>
                     <br/> <br/>
					 <input type="hidden" name="offerID" id="offerID" value="<?php 
            echo $offerID;?>">
					 	 
                <button type="submit" class="btn btn-primary" > Edit  </button>
                <br/> <br/>
                    
            </form>
	 <?php }
		 }
		 ?>
					</div>	<!-- End of /.col-md-9 -->
			
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->
	
	<!-- FOOTER Start
    ================================================== -->
<?php include('footer.php'); ?>

</body>
</html>