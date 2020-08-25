
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
					  	<li><a href="">Phamrcy Admin</a></li>
					  	<li class="active">View All Offer</li>
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
                                  <a href="Add_Offer.php">
                                    <button class="au-btn au-btn-icon au-btn--blue" >
                                        <i class="zmdi zmdi-plus"></i>Add New Offer</button></a>
                                </div>
                            </div>
                        </div>
			
					
						</div>
						<?php include ('OfferTables.php');?>
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