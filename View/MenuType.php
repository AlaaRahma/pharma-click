
	 
<?php 
                               
	 if(!isset($_SESSION['id'])) {
									
                                ?> 
										<ul class="nav navbar-nav nav-main">

		        	<li><a href="index.php">Home</a></li>
					<li><a href="products.php">Store</a></li>
					<li><a href="offers.php"> Offers</a></li>
					<!--<li><a href="blog-single.html">ARTICLE</a></li> -->
					<li class="dropdown">
						<a href="#">
							Category List 
							<span class="caret"></span>
						</a>
				 <?php include('CatList.php'); ?>  
					</li> <!-- End of /.dropdown -->
                          
                                      
                               
						<li class="dropdown">
						<a href="#">
							Pharmacy List 
							<span class="caret"></span>
						</a>
				 <?php include('PharmacyList.php'); ?>  
					</li> <!-- End of /.dropdown -->		
                              
					<li><a href="contactMessages.php"> Contact</a></li>
		        </ul> <!-- End of /.nav-main -->
											<?php } 
								
	else { if ($_SESSION['user_type']==2){
	?>
	<ul class="nav navbar-nav nav-main">

		        	
					<li><a href="PharmacyProducts.php">Our Store</a></li>
					<li><a href="OurOffers.php">Our Offers</a></li>
					<!--<li><a href="blog-single.html">ARTICLE</a></li> -->
					<li class="dropdown">
						<a href="#">
							Category List 
							<span class="caret"></span>
						</a>
				 <?php include('CatList.php'); ?>  
					</li> <!-- End of /.dropdown -->
                          
                                        <li class="dropdown">
                                           <a href="#"> <?= $_SESSION['name']?><span class="caret" ></span></a>
                                           
                                            <ul class="dropdown-menu"> 
                                                <li><a href="EditmyProfile.php">Pharmacy Profile</a></li>
                                                 <li><a href="PharmacyBranches.php"> Our Branches</a></li> 
                                                <li><a href="PharmacyDrugs.php"> All Products</a></li> 
                                                <li><a href="PharmacyOffers.php"> All Offers</a></li> 
                                                <li><a href="PharmacyOrders.php"> Our Orders</a></li>
                                              
                                              
                                            </ul>
											  </li>
                               
								<li><a href="contactMessages.php"> Contact</a></li>
                              
					
		        </ul> <!-- End of /.nav-main -->
				 <?php } 
								else if ($_SESSION['user_type']==3)
								{?>
								<ul class="nav navbar-nav nav-main">

		        	<li><a href="index.php">Home</a></li>
					<li><a href="products.php">Store</a></li>
					<li><a href="offers.php"> Offers</a></li>
					<!--<li><a href="blog-single.html">ARTICLE</a></li> -->
					<li class="dropdown">
						<a href="#">
							Category List 
							<span class="caret"></span>
						</a>
				 <?php include('CatList.php'); ?>  
					</li> <!-- End of /.dropdown -->
					<li class="dropdown">
						<a href="#">
							Pharmacy List 
							<span class="caret"></span>
						</a>
				 <?php include('PharmacyList.php'); ?>  
					</li> <!-- End of /.dropdown -->		
                          
                                        <li class="dropdown">
                                             <a href="#"> <?= $_SESSION['name']?><span class="caret" ></span></a>
                                           
                                            <ul class="dropdown-menu"> 
                                                <li><a href="EditmyProfile.php">My Profile</a></li>
                                                
                                                <li><a href="cartView.php">My Cart</a></li> 
                                                
                                                <li><a href="MyOrders.php">My orders</a></li>
                                              
                                              
                                            </ul>
											  </li>

                               <li><a href="contactMessages.php"> Contact</a></li>
								
                              
					
		        </ul> <!-- End of /.nav-main -->
											<?php } else if ($_SESSION['user_type']==1){?>
								<ul class="nav navbar-nav nav-main">

		        	<li><a href="index.php">Home</a></li>
					<li><a href="products.php">Store</a></li>
					<li><a href="offers.php"> Offers</a></li>
					<li><a href="AdminDashboard.php"> Admin Panel</a></li>
					<!--<li><a href="blog-single.html">ARTICLE</a></li> -->
					<li class="dropdown">
						<a href="#">
							Pharmacy List 
							<span class="caret"></span>
						</a>
				 <?php include('CatList.php'); ?>  
					</li> <!-- End of /.dropdown -->
                          
                                      
                               
								
                              
					
		        </ul> <!-- End of /.nav-main -->
	<?php } }?>
										