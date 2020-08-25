

<!DOCTYPE html>
<html lang="en">
    <!-- header -->
    <?php
    session_start();
    include 'header.php';
    include_once '../BusinessLogic/Address.php';
    include_once '../BusinessLogic/Cart.php';
    $Address= new Address();
    $patientId=$_SESSION['id'];
    $currentAddress=$Address->GetPatientAddress($patientId);
    $cities=$Address->Cities();
    $zones=$Address->Zones();
    // cart drugs
    $cart= new Cart();
    $cartDrugs=$cart->ViewCart($patientId);
    
    
    ?> 
    
        <div class="site-wrap">
        <div class="container">
            <form method="post" action="placeOrder.php">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Billing Details <br></h2>
              <?php 
              if(count($cartDrugs)==0) {
                  echo'<div class="alert alert-warning">You Can Not Place Order'
                  . 'With Empty Cart<br> Add New Drug!</div>';
                  
              }
              ?>
            
                 <div class="form-group row">
                <div class="col-md-12">
                  <label for="current_add" class="text-black">Current Address </label>
                  <input type="text" class="form-control" id="current_add" name="CurrentAddress"
                         value="<?php echo $currentAddress[0]['City'].' - '.$currentAddress [0]['Zone'].' - '.
                                 $currentAddress[0]['address'];?> "  readonly>
                </div>
              
            </div>
            
              <div class="form-group row">
                  <input type="checkbox"  name="difAdd" id="difAdd" onclick="myfunction()"> 
                  <strong> Ship To A Different Address?</strong>
<!--                  <input type="radio" value="1" name="difBox" 
                            data-toggle="collapse" 
                   aria-expanded="false" onclick="myfunction()">
                  Ship To A Different Address?
                <div class="collapse" id="ship_different_address">-->
                  <div class="py-2">
    
    
                      <div class="form-group row"id="diffDetails" style="display: none" >
                      <div class="col-md-6">
                        <label for="diff_city" class="text-black">City <span
                            class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="diff_city" name="diff_city">
                             <option value='0'>Select City </option>
                       <?php
                       
                          foreach($cities as $city){
                              echo '<option value="'.$city['city_id'].'"';
                              echo '>';
                              echo $city['Name'].'</option>';
                          }
                       ?>
                    </select>
                      </div>
                      <div class="col-md-6">
                        <label for="diff_zone" class="text-black">Zone <span
                            class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="diff_zone" name="diff_zone">
                                 <option value='0'>Select Zone</option>
                       <?php
                       
                          foreach($zones as $zone){
                           echo '<option value="'.$zone['zone_id'].'"';
                              echo '>';
                              echo $zone['Name'].'</option>';
                          }
                       ?>
                        </select>
                      </div>
                    
    
                    <div class="form-group row mb-5">
                      <div class="col-md-6">
                        <label for="diff_address" class="text-black"> Street&building <span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="diff_address" name="diff_address">
                      </div>
                      <div class="col-md-6">
                        <label for="diff_phone" class="text-black">Phone number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="diff_phone" name="diff_phone"
                          placeholder="Enter a new phone number">
                      </div>
                    </div>
    
                  </div>
                </div>
                </div>
              
<!--                <div class="form-group">
                <label for="c_order_notes" class="text-black">Order Notes</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                  placeholder="Write your notes here..."></textarea>
              </div>-->
    
     </div>
          
          <div class="col-md-6">
    
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Drug</th>
                      <th>quantity</th>
                      <th>Total</th>
                      
                    </thead>
                    <tbody>
                        <?php 
                        $totalPrice=0;
                        foreach ($cartDrugs as $order) {
                           
                        ?>
                      <tr>
                        <td> <?php echo $order['Drug_Name'];?></td>
                        <td><?= $order['quantity'];?></td>
                        <td><?= $order['totalPrice']." EGP"; ?></td>
                      </tr>
                        <?php
                        $totalPrice=$totalPrice+$order['totalPrice'];
                        } 
                        ?>
                      </tbody>
                    <tfoot>
                      <tr>     
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black"><?php echo $totalPrice." EGP"; ?></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><?php echo $totalPrice." EGP";?></td>
                      </tr>
                    </tfoot>
                  </table>
                    
                </div>
              </div>
            </div>
                <div  id="payment">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button"
                        aria-expanded="false" aria-controls="collapsecheque"> Payment</a></h3>
    
                    <div class="collapse" id="collapsecheque">
                      <div >
                        <p class="mb-0">Cash On Delivery (COD).</p>
                      </div>
                    </div>
                  </div>
              <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" >Place
                      Order</button>
                  </div>
          </div>
        </div>
        </div>
                
        
        </form>

        </div>
        </div>
        
              
            
       
    

<!--    <div class="site-section bg-secondary bg-image" style="background-image: url('images/bg_2.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
              
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                
  
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>-->

  


</body>
    <!-- footer -->
<?php
include 'footer.php';
    
?> 
</html>

<script> 
function myfunction (){
    var difAdd= document.getElementById("difAdd"); 
    var diffDetails=document.getElementById("diffDetails");
    if (difAdd.checked==true) {
        diffDetails.style.display="block";
    }
    else {
        diffDetails.style.display="none";
    }

}
</script>