<!doctype html>
<html lang="en">

<?php include('header.php');?>

<body>

	<!-- SLIDER Start
    ================================================== -->


	<section id="slider-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="slider" class="nivoSlider">
				    	<img src="images/pills.jpg" alt="" />
				    	<img src="images/cosmetic.jpg" alt=""/>
				    	<img src="images/pills1.jpg" alt="" />

					</div>	<!-- End of /.nivoslider -->
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section> <!-- End of Section -->


	
	<!-- FEATURES Start
    ================================================== -->

	<section id="features">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
						    	<i class="fa fa-ambulance"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">Free Shipping</h4>
						    	
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
								<i class=" fa fa-foursquare"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">24 hours working </h4>
						    	
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
						    	<i class=" fa fa-phone"></i>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading">Call Us</h4>
						    	<p>01114688954</p>
						  </div>	<!-- End of /.media-body -->
						</div>	<!-- End of /.media -->
					</div>	<!-- End of /.block -->
				</div> <!-- End of /.col-md-4 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of section -->



	<!-- CATAGORIE Start
    ================================================== -->

	<section id="catagorie">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>OUR Main CATEGORIES</h2>
						</div>	
						<div class="row">
						  	<div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							    	<a class="catagotie-head" href="products.php">
										<img src="images/medicine1.jpg" alt="...">

										<h3>Medical</h3>
									</a>
							      	<div class="caption">
				
							        	<p>
                                                                            <a href="products.php" class="btn btn-default btn-transparent" role="button">
							        			<span>Check Items</span>
							        		</a>
							        	</p>
							      	</div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						  	<div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
                                                                <a class="catagotie-head" href="products.php">
										<img src="images/cosmetics.jpg" alt="...">
										<h3>Cosmetics</h3>
									</a>
							      	<div class="caption">
							        	
							        	<p>
                                                                            <a href="products.php" class="btn btn-default btn-transparent" role="button">
							        			<span>Check Items</span>
							        		</a>
							        	</p>
							      	</div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						  	<div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
                                                                <a class="catagotie-head" href="products.php">
										<img src="images/newborn.jpg" alt="...">
										<h3>Baby Care </h3>
									</a>
							      	<div class="caption">
								      
								        <p>
                                                                            <a href="products.php" class="btn btn-default btn-transparent" role="button">
								        		<span>Check Items</span>
								        	</a>
								        </p>
								    </div>	<!-- End of /.caption -->
							    </div>	<!-- End of /.thumbnail -->
						  	</div>	<!-- End of /.col-sm-6 col-md-4 -->
						</div>	<!-- End of /.row -->
					</div>	<!-- End of /.block --> 
				</div>	<!-- End of /.col-md-12 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->



	
		<!-- PRODUCTS Start
    ================================================== -->

	<section id="products">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="products-heading">
						<h2>Best Selling </h2>
					</div>
				</div>
			</div>
		 <?php include('ProductModel.php'); ?>  

			
			</div>	<!-- End of /.row -->
			
			<div class="block-headingg">
			<p>
								        	<a href="products.php" class="btn btn-default btn-transparent" role="button">
								        		<span>All Products</span>
								        	</a>
								        </p>
			</div>
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->


	
	
		<!-- CALL TO ACTION Start
    ================================================== -->

	<section id="call-to-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>Our Partners</h2>
						</div>
					</div>	<!-- End of /.block -->
					<div id="owl-example" class="owl-carousel">
						<div> <img src="images/19011.jpg" alt=""></div>
						<div> <img src="images/Misr.jpg" alt=""></div>
						<div> <img src="images/roshdy.jpg" alt=""></div>
						<div> <img src="images/delmar.jpg" alt=""></div>
						<!--<div> <img src="images/company-5.png" alt=""></div>
						<div> <img src="images/company-6.png" alt=""></div>
						<div> <img src="images/company-8.png" alt=""></div>
						<div> <img src="images/company-9.png" alt=""></div>-->
					</div>	<!-- End of /.Owl-Slider -->
				</div>	<!-- End of /.col-md-12 -->
			</div> <!-- End Of /.Row -->
		</div> <!-- End Of /.Container -->
	</section>	<!-- End of Section -->
	
	

	<!-- FOOTER Start
    ================================================== -->
    
<?php include('footer.php'); ?>

</body>
</html>