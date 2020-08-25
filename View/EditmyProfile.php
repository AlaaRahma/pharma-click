
<!DOCTYPE html>
<html lang="en">
    <!-- header -->
    <?php
    session_Start (); 
   
    include 'header.php';
    include_once '../BusinessLogic/Address.php';
 // to insert city and zone to user's profile
    $Address= new Address(); 
    $cities= $Address->Cities(); 
    $zones=$Address->Zones();
   
    ?> 
    <head>
        <style> 
            input {
                width: 30%;
                color:blue;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <h2>Edit profile</h2>
            <br/>
            <?php
            if (isset($_SESSION['error']) && $_SESSION['error'] == 'success') {
                echo '<div class="alert alert-success" role="alert">
              Changes Saved Successfully!
             </div>';
            } else if(isset($_SESSION['error']) && $_SESSION['error'] == 'incomplete') {
                echo '<div class="alert alert-warning" role="alert">
                   Please,fill your required data
              </div>';
            }
            else if(isset($_SESSION['error']) && $_SESSION['error'] == 'failure'){
                  echo '<div class="alert alert-danger" role="alert">
                      Database Failure
              </div>';
            }
             unset($_SESSION['error']);
              
            ?> 
            <form action="EditProfile.php" method="post">
                <div class="row">
                    <?php
                    if($_SESSION['user_type']==2){
                        
                    
                    ?>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="firstName">pharmacy Name:</label>
                            <input type="text" class="form-control" id="FName" placeholder="Enter your first Name" name="firstName" value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['name'];
                
                }  
                
                ?>">

                        </div>
                    </div>
                        <?php 
                    } 
                    else if($_SESSION['user_type']==3) {
                        
                    ?>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="form-control" id="FName" placeholder="Enter your first Name" name="firstName" value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['name'];
                } ?>">

                        </div>
                    </div>
                    <?php 
                    } ?>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="form-control" id="LName" placeholder="Enter your last Name" name="lastName"value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['lastName'];
            } ?>">
                        </div>
                    </div>
                </div>


                <div class="row"> 
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <select  class="form-control" name="nationality" id="nation">
                        
                        <option value="Egypt" <?php if($_SESSION['nationality']=='Egypt') echo 'selected'; ?>> Egypt </option> 
                        <option value= "Syria" <?php if($_SESSION['nationality']=='Syria') echo 'selected'; ?>>Syria </option> 
                        <option value= "Europe"<?php if($_SESSION['nationality']=='Europe') echo 'selected'; ?> > Europe </option>
                        <option value ="Asia" <?php if($_SESSION['nationality']=='Asia') echo 'selected'; ?>> Asia </option> 
                        <option value="Africa"<?php if($_SESSION['nationality']=='Africa') echo 'selected'; ?>> Africa </option> 
                        <br/>
                    </select>  
                </div>
                    </div>
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" readonly value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['email'];
            } ?>">
                </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter a password" name="password"value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['password'];
            } ?>">
                </div>
                    </div>
                    <div class="col-lg-6">
                <div class="form-group"> 


                    <label for="city">City</label>
                    <select type ="text" name="city" id="city" class="form-control" >
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
                </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                    <label for="zone">Zone</label>
                        <select type="text" name="zone"id="zone"class="form-control" >
                            <option value='0' >Select zone</option>
                            <?php 
                            foreach ($zones as $zone){
                            echo   '<option value ="'.$zone['zone_id'].'"';
                            if($_SESSION['zone_id']==$zone['zone_id'])    echo 'selected';
                            echo '>'; echo $zone['Name'].'</option>'; 
                            
                            }
                                ?>
                        </select>
             
                    
                </div>
                    </div>
                      <div class="col-lg-6">
                <div class="form-group">
                    <label for="address"> Street&building: </label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address details" value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['address'];
            } ?>"  /> 
                </div> 
                    </div>
                </div>
                    <?php 
                    if ($_SESSION['user_type']==2){
                    ?>
                    <div class="row">
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="commercial_reg"> Commercial Register: </label>
                    <input type="text" name="commercial_reg" id="commercial_reg" class="form-control"  value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['commercial_reg'];
                } ?>" readonly/> 
                </div> 
                    </div>
                        <div class="col-lg-6">
                <div class="form-group">
                    <label for="license"> license: </label>
                    <input type="text" name="license" id="license" class="form-control" placeholder="Enter a valid phone number" value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['licence'];
                } ?>" readonly /> 
                </div> 
                    </div>
                      
                </div>
                    <?php 
                    } 
                    ?>
                    <div class="row">
                    <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone_num"> Phone number: </label>
                    <input type="tel" name="phone_num" id="phone_num" class="form-control" placeholder="Enter a valid phone number" value="<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['phone_num'];
            } ?>"  /> 
                </div> 
                    </div>
                        
                </div>
                
                         
                <button type="submit" class="btn btn-primary" > Save </button>
                <br/> <br/>
                    
            </form>
        </div>
    </body>
    <!-- footer -->
<?php
include 'footer.php';
?> 
</html>
