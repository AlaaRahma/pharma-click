
<!doctype html>
<html lang="en">


<body>


<!-- TOP HEADER Start
    ================================================== -->
	<?php include('header.php');
	
 include_once '../BusinessLogic/Pharmacy_Admin.php';

//$catid=$_SESSION['id'];
if (isset($_GET['id']))
 {
 // get id value

 $Pharmid=$_GET['id'];}

 $pharmacyProducts = new Pharmacy_Admin();

	$result= $pharmacyProducts->PharmacyName($Pharmid);
  $no_of_rows = mysqli_num_rows($result);
		
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
// echo ?>

	<!-- SLIDER Start
    ================================================== -->


\

	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1> <?php 
				
	echo $row['First_name'];  ?>  Store </h1>
			
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="index.php">Home</a></li>
					  	<li class="active"><?php 
				
	echo $row['First_name']; 
	} ?> Store</li>
					</ol>
				</div>	<!-- End of /.col-md-8 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of /#Topic-header -->



	<!-- PRODUCTS Start
    ================================================== -->

	<section id="shop">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="products-heading">
		 <h2> All PRODUCTS</h2>
					</div>	<!-- End of /.Products-heading -->
					<div class="product-grid">
					   <div class="row">
		 <?php include('Pharma_products.php'); ?>  

	</div>
			
					</div>	<!-- End of /.products-grid -->

					<!-- Pagination -->
<div class="row">
					<?php include ('Cat_Products_Paging.php');?>
					</div>

				</div>	<!-- End of /.col-md-9 -->
				
				
				<div class="col-md-3">
				
					<div class="blog-sidebar">
						<?php include ('PharmCatg.php')?>
						<div class="block">
							<img src="" alt="">
						</div>
					
		<?php include ('MedicalTags.php');?>
					
				</div>	<!-- End of /.col-md-3 -->
			
			</div>	<!-- End of /.row -->
			<div class="row">
						<?php include('PharmacyBranchesView.php'); ?>
						</div>
		</div>	<!-- End of /.container -->
	
		</div>
	</section>	<!-- End of Section -->


	


	





	<!-- FOOTER Start
    ================================================== -->
<?php include('footer.php'); ?>

</body>
</html>