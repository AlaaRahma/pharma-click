
<!doctype html>
<html lang="en">
<?php
 include_once '../BusinessLogic/drug.php';
?>

<body>


<!-- TOP HEADER Start
    ================================================== -->
	<?php include('header.php');?>
	  <?php include('PhrmaStyle.php');?>

	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
				
					
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="pharmcyAdmin.php">Phamrcy Admin</a></li>
					  	<li class="active">View All Product</li>
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
	<div class="container">
			<div class="row">
				<div class="col-md-4">
				<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                  <a href="PharmcyAddProduct.php">
                                    <button class="au-btn au-btn-icon au-btn--blue" >
                                        <i class="zmdi zmdi-plus"></i>Add new  product</button></a>
                                </div>
                            </div>
                        </div>
			
					
						</div>
						<?php include ('ProductsTables.php');?>
				</div>
				</div>
	</div>
					</div>	<!-- End of /.col-md-9 -->
			
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->
	
	<!-- FOOTER Start
    ================================================== -->
<?php include('footer.php'); ?>
  



</body>
</html>