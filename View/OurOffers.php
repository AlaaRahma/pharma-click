
<!doctype html>
<html lang="en">


<body>


<!-- TOP HEADER Start
    ================================================== -->

	<?php include('header.php');?>


	<!-- SLIDER Start
    ================================================== -->




	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>Offers</h1>
					<p>Latest Offers</p>
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	
                                            <li class="active"><strong>Our offers</strong></li>
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
						<h2></h2>
					</div>	<!-- End of /.Products-heading -->
					 
		  
		  
					<div class="product-grid">
					   <div class="row">
		 <?php include('AllPharmacyOfferList.php'); ?>  

	</div>
			
					</div>	<!-- End of /.products-grid -->

					<!-- Pagination -->

					
					
				</div>	<!-- End of /.col-md-9 -->
				<div class="col-md-3">
					<div class="blog-sidebar">
						
						
					
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