<?php 
 include_once '../BusinessLogic/Pharmacy_Admin.php';
  include_once '../BusinessLogic/Admin.php';
 include_once '../BusinessLogic/drug.php';
$druginfo = new Pharmacy_Admin();
$sub = new Admin ();
$tags=new drug();
$result= $druginfo->CatList();
$subresult=$sub->SubList();
$ingred=$druginfo->Get_ActiveIng();
$form=$druginfo->Get_Form_type();
$companyname=$druginfo->Get_CompanyNames();
$gettags=$tags->Products_tags();
  $no_of_rows = mysqli_num_rows($result);
  $no_of_rows1 = mysqli_num_rows($subresult);
    $no_of_rows2 = mysqli_num_rows($ingred);
  $no_of_rows3 = mysqli_num_rows($form);
    $no_of_rows4 = mysqli_num_rows($companyname);
  $no_of_rows5 = mysqli_num_rows($gettags);
   
	
  
  
?>

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add Product</strong> Elements
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="NewDrugAdd.php" method="GET" enctype="multipart/form-data" class="form-horizontal">
                                          
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="productname" class=" form-control-label">Product Name </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="productname" name="productname" placeholder="Enter Product Name" class="form-control">
                                           
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="prescription" class=" form-control-label">prescription</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="prescription" name="prescription" placeholder="Enter prescription" class="form-control">
                                                 
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="deprecated_drugs" class=" form-control-label">deprecated_drugs</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="deprecated_drugs" name="deprecated_drugs" placeholder="Enter deprecated drugs" class="form-control">
                                                    
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="price" class=" form-control-label">price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="price" id="price" name="price" placeholder="Enter Product Price" class="form-control">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="Desc" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="Desc" id="Desc" rows="9" placeholder="Enter Product Desc..." class="form-control"></textarea>
                                                </div>
                                            </div>

                                       
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="Category" class=" form-control-label">Category Select</label>
                                                </div>
                                                <div class="col-12 col-md-9">
																									  <?php
		 if ($no_of_rows >0){?>

            								
                                                    <select name="Category" id="Category" class="form-control">
	                                            <option disabled="" selected ="" value="0">Please select</option>
																							
												<?php  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>				
                                                        <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_Name'];?></option>
                                                     	<?php
													
		 }  			
			 
		 ?>   
                                                    </select>
													<?php
		 } 												
 ?>
                                                </div>
                                            </div>
                                       
                                          <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="Sub-Category" class=" form-control-label">SubCategory Select</label>
													
                                                </div>
                                                <div class="col-12 col-md-9">
																													  
																									  <?php
		 if ($no_of_rows1 >0){?>

            								
                                                    <select name="Sub-Category" id="Sub-Category" class="form-control">
	                                            <option disabled="" selected ="" value="0">Please select</option>
																							
												<?php  while ($row1 = mysqli_fetch_array($subresult, MYSQLI_ASSOC))
{
?>				
                                                        <option value="<?php echo $row1['Sub_id'];?>"><?php echo $row1['cat_Name']; echo '-'; echo $row1['Sub_Name'];?> </option>
                                                     	<?php
													
		 }  			
			 
		 ?>   
                                                    </select>
													<?php
		 } 												
 ?>
													
                                                </div>
                                            </div>
											
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="Ingredients" class=" form-control-label">Active Ingredients  Select</label>
                                                </div>
                                                <div class="col-12 col-md-9">
																																				  <?php
		 if ($no_of_rows2 >0){?>

            								
      
                                                    <select name="Ingredients" id="Ingredients" class="form-control">
                                                            													
												<?php  while ($row2 = mysqli_fetch_array($ingred, MYSQLI_ASSOC))
{
?>				
                                                        <option value="<?php echo $row2['id'];?>"><?php echo $row2['Name']; ?> </option>
                                                     	<?php
													
		 }  			
			 
		 ?>   
                                                    </select>
													<?php
		 } 												
 ?>
                                                  
                                                </div>
                                            </div>
											
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="Company" class=" form-control-label">Company  Select</label>
                                                </div>
                                                <div class="col-12 col-md-9">
					<?php																																									 
		 if ($no_of_rows4 >0){
			 ?>

            				
                                                    <select name="Company" id="Company" class="form-control">
                                                   		<?php  while ($row4 = mysqli_fetch_array($companyname, MYSQLI_ASSOC))
{
?>				
                                                        <option value="<?php echo $row4['company_id'];?>"><?php echo $row4['company_name']; ?> </option>
                                                     	<?php
													
		 }  			
			 
		 ?>   
                                                    </select>
													<?php
		 } 												
 ?>
         
                                                </div>
                                            </div>
										
											  <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="Form" class=" form-control-label">Form  Select</label>
                                                </div>
                                                <div class="col-12 col-md-9">
														<?php																																									 
		 if ($no_of_rows3 >0){
			 ?>
                                                    <select name="Form" id="Form" class="form-control">
                                                                		<?php  while ($row3 = mysqli_fetch_array($form, MYSQLI_ASSOC))
{
?>				
                                                        <option value="<?php echo $row3['form_id'];?>"><?php echo $row3['form_type']; ?> </option>
                                                     	<?php
													
		 }  			
			 
		 ?>   
                                                    </select>
													<?php
		 } 												
 ?>
                                                </div>
                                            </div>
                                          
                                     <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="tags" class=" form-control-label">Tag  Select</label>
                                                </div>
                                                <div class="col-12 col-md-9">
														<?php																																									 
		 if ($no_of_rows5 >0){
			 ?>
                                                    <select name="tags" id="tags" class="form-control">
                                                                		<?php  while ($row5 = mysqli_fetch_array($gettags, MYSQLI_ASSOC))
{
?>				
                                                        <option value="<?php echo $row5['Tag_id'];?>"><?php echo $row5['Tag_Name']; ?> </option>
                                                     	<?php
													
		 }  			
			 
		 ?>   
                                                    </select>
													<?php
		 } 												
 ?>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                           
											 <div class="" style="
    padding-left: 26%;">
    
	
    <img src="image.jpg" id="blah" height="187" width="187" style="text-align: center;" alt="Upload Photo"><br><br>
    <input type="file" id="fileToUpload" name="fileToUpload" value="fileToUpload" >
    <input type="submit" id="fileToUpload" name="fileToUpload" value="" >
	
	

	
    <br><br>
    </div>
                                    </div>



									
									
									
                                       <button type="submit" class="btn btn-primary" > Add  </button>
                <br/> <br/>
                                        </form>
                                    </div>
                              

                               
                    <script>
						function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(596)
                        .height(360);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	
					</script>