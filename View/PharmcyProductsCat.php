
<!doctype html>
<html lang="en">


<body>


<!-- TOP HEADER Start
    ================================================== -->
	<?php include('header.php');
	include_once '../BusinessLogic/Pharmacy_Admin.php';

include_once '../BusinessLogic/drug.php';

//$catid=$_SESSION['id'];
if (isset($_GET['id']))
 {
 // get id value

 $catid=$_GET['id'];
 $Pharmid=$_GET['pharmacyid'];
// echo $catid;
 }
 $pharmacyProducts = new Pharmacy_Admin();

	$result1= $pharmacyProducts->PharmacyName($Pharmid);
	$no_of_rows1 = mysqli_num_rows($result1);
$catProducts = new drug();
$result= $catProducts->Cat_Name($catid);
  $no_of_rows = mysqli_num_rows($result);
	

?>
	<!-- SLIDER Start
    ================================================== -->




	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1><?php while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
{ echo $row1['First_name']; } ?>  Store </h1>
					<p><?php  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{ echo $row ['cat_Name'];  ?> Products</p>
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="index.php">Home</a></li>
<li class="active"> <?php echo $row ['cat_Name'];  }?> Store</li>
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
						<h2>All PRODUCTS</h2>
					</div>	<!-- End of /.Products-heading -->
					<div class="product-grid">
					   <div class="row">
		 <?php include('Pharmacy_Cat_Products.php'); ?>  

	</div>
			
					</div>	<!-- End of /.products-grid -->

					<!-- Pagination -->

				<!--  	<div class="pagination-bottom">
						<ul class="pagination">
						  	<li class="disabled"><a href="#">&laquo;</a></li>
						  	<li class="active"><a href="#">1 <span class="sr-only"></span></a></li>
						  	<li><a href="#">2</a></li>
						  	<li><a href="#">3</a></li>
						  	<li><a href="#">4</a></li>
						  	<li><a href="#">»</a></li>
						</ul>	<!-- End of /.pagination -->
					<!--</div> */ -->
				</div>	<!-- End of /.col-md-9 -->
			<div class="col-md-3">
					<div class="blog-sidebar">
						<?php include ('pharmasublist.php')?>
						
					
		<?php include ('MedicalTags.php');?>
					
				</div>	<!-- End of /.col-md-3 -->
			
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->


	


	





	<!-- FOOTER Start
    ================================================== -->
<?php include('footer.php'); ?>

</body>
</html>