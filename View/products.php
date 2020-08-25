
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
					<h1>Store </h1>
					<p>A Bunch Of Products</p>
				</div>	<!-- End of /.col-md-4 -->
                                
                                <div class="col-md-4">
                                    <p><strong>Filter By Location</strong><br><p>
                                    <div class="row-md-2">
                                    <form method="post" action="GeneralSearchResults.php">
					<div class="search-box active" >
						<div class="input-group">
                                                    
                                                    <input class="form-control" name="searchLoc" id="searchLoc" type="text" placeholder="Search in your nearest store.." aria-label="Search">
                                                   
					      	<span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit"></button>
					      	</span>
					    </div><!-- /.input-group -->
					</div>
                                    </form>
                                        <!-- /.search-box -->
				</div>
                                    
<!--                                    <input class="form-control" id="searchLoc" name="searchLoc" type="search">-->
                                </div>
                      
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="index.php">Home</a></li>
					  	<li class="active">Store</li>
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
						<h2>NEW PRODUCTS</h2>
					</div>	<!-- End of /.Products-heading -->
					 
		  
		  
					<div class="product-grid">
					   <div class="row">
		 <?php include('AllProductsList.php'); ?>  

	</div>
                                        </div>	
					</div>
                            <!-- End of /.products-grid -->

<div class="col-md-3">
					<div class="blog-sidebar">
						<?php include ('CatgProducts.php')?>
						<div class="block">
							<img src="images/Misr.jpg" alt="">
						</div>
					
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