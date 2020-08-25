
<!doctype html>
<html lang="en">


<body>


<!-- TOP HEADER Start
    ================================================== -->
	<?php include('header.php');
	
 include_once '../BusinessLogic/drug.php';

//$catid=$_SESSION['id'];
if (isset($_GET['id']))
 {
 // get id value

 $catid=$_GET['id'];
// echo $catid;
 }
$catProducts = new drug();
$result= $catProducts->Cat_Name($catid);
  $no_of_rows = mysqli_num_rows($result);
	
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>

	<!-- SLIDER Start
    ================================================== -->




	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
		 <h1> <?php echo $row ['cat_Name']; ?>  Store </h1>
					<p>A Bunch Of Products</p>
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="index.php">Home</a></li>
<li class="active"> <?php echo $row ['cat_Name'];  ?> Store</li>
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
		 <?php include('Cat_products.php'); ?>  

	</div>
			
					</div>	<!-- End of /.products-grid -->

					<!-- Pagination -->

					<?phpinclude ('Cat_Products_Paging.php');?>
				</div>	<!-- End of /.col-md-9 -->
				<div class="col-md-3">
					<div class="blog-sidebar">
						<?php include ('SubCatgList.php')?>
						<div class="block">
							<img src="images/Misr.jpg" alt="">
						</div>
					
		<?php include ('MedicalTags.php');?>
					
				</div>	<!-- End of /.col-md-3 -->
			
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->


	


	
<?php  }?>




	<!-- FOOTER Start
    ================================================== -->
<?php include('footer.php'); ?>

</body>
</html>