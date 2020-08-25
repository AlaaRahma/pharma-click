<?php
 session_start();
 include_once '../BusinessLogic/Cart.php';
 $cart=new Cart();

 
?>
<head>
		<meta charset="UTF-8">
	<title>Medical</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

	<!-- Css -->
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/Orderview.css">
        
	  <link rel="stylesheet" href="fonts/icomoon/style.css">


  <link rel="stylesheet" href="css/style.css">

	<!-- jS -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/main.js" type="text/javascript"></script>
        
		

 


        
	<link href="assets/css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="assets/js/login-register.js" type="text/javascript"></script>



</head>


<!-- TOP HEADER Start
    ================================================== -->
	
	<section id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					
				</div>
				<div class="col-md-3 clearfix">
					<ul class="login-cart">
					 <?php
					// echo $id;
                                            if(!isset($_SESSION['id']))
											{
                                            ?>
						<li>
							<a data-toggle="modal" data-target="#loginModal" href="#">
							<i class="fa fa-user"></i>
								Login
								

							</a>
						</li>
						         <?php } else{?>
						    <li>
                                                    <a href="Logout.php">
							<i class="fa fa-user"></i>
								Logout
							</a>
						</li>
                                            <?php }?>
                                                <?php 
											//update 
												if (isset($_SESSION['id'])&&$_SESSION['user_type']==3) { 
													$patientId=$_SESSION['id'];
 $count=$cart->CountDrugs($patientId);
 $Cartproducts=$cart->ViewCart($patientId);
 
 ?>
                                                <li>
                                                    <ul>
							<div class="cart dropdown">
						  		<a data-toggle="dropdown" href="#">
                                                                    <i class="fa fa-shopping-cart"></i>Cart(<?php  echo $count;?>)</a>
					  			<div class="dropdown-menu dropup">
					  				<span class="caret"></span>
						  			<ul class="media-list">
								  		<li class="media">
                                                                                    <div class="container">
                                                                                    <?php 
                                                                                    for ($i=0; $i<=1 && $count !=0 && $i<$count ; $i++) {
                                                                                                                                    
                                                                                                                                 ?>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6">
										    <img class="pull-left" src="<?= $Cartproducts[$i]['image_path']?>" alt="">
                                                                                    
                                                                                            </div>
                                                                                            <div class="col-lg-6">
										    <div class="media-body">
                                                                                        <h6> 
                                                                                            <?= $Cartproducts[$i]['Drug_Name']?>
								    				<span><?=$Cartproducts[$i]['price']." EGP"?></span>
								    			</h6>
                                                                                    </div>
                                                                                   </div>
                                                                                    </div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
								    		    
                                                                                    </div>
                                                        </li>
									</ul>
                                                                        <li>
                                                                            
                                                                        <form action="cartView.php">
                                                                        <div class="row">
                                                                              
                                                                            <div class="col-lg-6" >
                                                                                <?php 
                                                                                if($count !=0){
                                                                              ?>
                                                                                <button class=" btn btn-primary btn-sm " type="submit" >View Details</button>
                                                                              <?php }
                                                                                 else{
                                                                                          echo '<span class="center-block label label-danger" id="Empty">Empty Cart</span>
';
                                                                                 }
                                                                                ?>
                                                                            
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                        </form>
                                                                               
							    </div>
							</div>
						</li>
						  <?php } ?>
					</ul>
				</div>
				<div class="col-md-2">
                                    <form method="post" action="GeneralSearchResults.php">
					<div class="search-box">
						<div class="input-group">
					    	<input id="search" name="search" placeholder="Search Drugs Here" type="text" class="form-control">
					      	<span class="input-group-btn">
                                                    <button class="btn btn-primary" id="general" type="submit"></button>
					      	</span>
					    </div><!-- /.input-group -->
					</div>
                                    </form>
                                        <!-- /.search-box -->
				</div>
			
			</div> <!-- End Of /.row -->
			<!-- End Of /.Container -->
		
				


        </section>

</section> <!-- End Of /.Section -->
	

	<!-- MODAL Start
    	================================================== -->
	<?php include('loginRegisterModal.php'); ?>  
	<!-- LOGO Start
    ================================================== -->
	
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="#">
						<img src="images/logoa.png" alt="logo">
					</a>
				</div>	
			</div>	
		</div>	 
	</header>  

	


	<!-- MENU Start
    ================================================== -->

	<nav class="navbar navbar-default">
		<div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div> <!-- End of /.navbar-header -->

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		      <?php 				//	 $id=$_SESSION['id'];

			  include('MenuType.php');?>
			  
			  
			  

		    </div>	<!-- /.navbar-collapse -->
		</div>	<!-- /.container-fluid -->
	</nav>	<!-- End of /.nav -->
