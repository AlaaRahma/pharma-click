
<!doctype html>
<html lang="en">


<body>


<!-- TOP HEADER Start
    ================================================== -->
	<?php include('header.php');
	 include_once '../BusinessLogic/Address.php';
 // to insert city and zone to user's profile
    $Address= new Address(); 
    $cities= $Address->Cities(); 
    $zones=$Address->Zones();?>


	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>Add New Branch </h1>
					
				</div>	<!-- End of /.col-md-4 -->
				<div class="col-md-8 hidden-xs">
					<ol class="breadcrumb pull-right">
					  	<li><a href="">Pharmacy Admin</a></li>
					  	<li class="active">Add New Branch</li>
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
	 <form action="BranchAddToPharmacy.php" method="GET">
               

				

                <div class="row"> 
				 <div class="col-lg-12">
                <div class="form-group">
                    <label for="branchname">Branch Name:</label>
                    <input type="text" class="form-control" id="branchname" placeholder="Enter Branch Name" name="branchname"  value="">
                </div>
                    </div>
                     <br/> <br/>
                    <div class="col-lg-12">
                <div class="form-group">
				<?php 
		
	   ?>
		
                    <label for="city">City :</label>
                    <select  class="form-control" name="city" id="city">
				

                         <option value='0'>Select City </option>
                       <?php
                       
                          foreach($cities as $city){
                              echo '<option value="'.$city['city_id'].'"';
                              if($_SESSION['city_id']==$city['city_id'])        echo 'selected';
                              echo '>';
                              echo $city['Name'].'</option>';
                         
						 }
						
                       ?>
                    </select>
                       
                        <br/>
							
                    </select>  
                </div>

                    </div>
					    <div class="col-lg-12">
                <div class="form-group">
		
		
                    <label for="zone">Zone :</label>
                    <select  class="form-control" name="zone" id="zone">
			
 <option value='0' >Select zone</option>
                            <?php 
                            foreach ($zones as $zone){
                            echo   '<option value ="'.$zone['zone_id'].'"';
                            if($_SESSION['zone_id']==$zone['zone_id'])    echo 'selected';
                            echo '>'; echo $zone['Name'].'</option>'; 
                            
                            }
                                ?>
                       
                        <br/>
							
                    </select>  
                </div>

                    </div>
					
					      <br/> 
                    <div class="col-lg-12">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter Branch address" name="address"  value="">
                </div>
                    </div>
                     <br/> <br/>
					  <div class="row">
                                   <div class="col-lg-6">
                <div class="form-group">
                    <label for="googleurl">Google Url :</label>
                    <input type="text" class="form-control" id="Copy Your Google Url"  name="googleurl"  value="">
                </div>
                    
					</div>
                 <br/> 
					                      <div class="col-lg-6">
               
                  
                <input class="btn btn-primary" value ="Get your Location "  readonly onclick="window.open('https://www.google.com/maps/place/Cairo,+Cairo+Governorate/@30.0596185,31.1884236,12z/data=!3m1!4b1!4m5!3m4!1s0x14583fa60b21beeb:0x79dfb296e8423bba!8m2!3d30.0444196!4d31.2357116','popUpWindow','height=400,width=600,left=10,top=10,,scrollbars=yes,menubar=no'); ">

 </input>
			  
                    </div>
					  </div>
                     <br/> <br/>
                
                    <div class="col-lg-12">
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="phone" class="form-control" id="phone" placeholder="Enter Branch phone" name="phone"  value="">
                </div>
                    </div>
                   
                </div>
                
         
                <button type="submit" class="btn btn-primary" > Add  </button>
                <br/> <br/>
                       </form>              
           
	
					</div>	<!-- End of /.col-md-9 -->
			
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.container -->
	</section>	<!-- End of Section -->
	
	<!-- FOOTER Start
    ================================================== -->
<?php include('footer.php'); ?>

</body>
</html>