
<!DOCTYPE html>
<html lang="en">
    <!-- header -->
    <?php
    session_Start (); 
    include 'header.php';
    include_once '../BusinessLogic/Cart.php';
    include_once '../BusinessLogic/pharmacy.php';
    //Cart 
    $patientCart= new Cart();
    $patientId=$_SESSION['id']; 
    $Cartproducts= $patientCart->ViewCart($patientId);
  //pharmacy
  $pharmacy=new Pharmacy_Admin();
  //totalPrice
  $totalprice=0;
    
    ?> 

    <body>
     <?php   
     if (!isset($_SESSION['id'])) {
         header("location:");
     }
         ?>
        <div class="container">
           <h3>Drug Cart</h3>


<?php 
//update
if (count($Cartproducts)==0) {
    if(isset($_SESSION['id'])) {
    echo'<div class="alert alert-warning">'
    . 'Your Cart is Empty, Add new drug to view in Cart!</div>';
    }
    else {
        echo'<div class="alert alert-warning">'
    . 'Your Cart is Empty,login to add products!</div>';
    }
}
else {
?>
        <div class="shopping-cart">   
  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    
    
   
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>
  <?php
     foreach($Cartproducts as $product){
         
         $drgId=$product['drug_id'];
         $pharmacyId=$product['pharmacy_id'];
         $quantity=$pharmacy->GetDrugQuantity($drgId, $pharmacyId);
       
       
  ?>
    
    
  <div class="product">
    <div class="product-image">
      <img src="<?php echo  $product['image_path']; ?>">
    </div>
    <div class="product-details">
        <div class="product-title"><b>Drug Name:</b> <?=$product['Drug_Name']?></div>
      <p class="product-description">
          <b>Company: </b> <?=$product['Company'];?> <br>
      <div>
          <b>Pharmacy: </b> <?= $product['Pharmacy'];?><br> 
      </div>
      <b>Description: </b>
         <?=$product['Desc'];?>
      </p>
    </div>
     
    <div class="product-price"><?php echo $product['price']."EGP";?></div>
    <div class="product-quantity">
        <input id='quantity' type="number" value="<?php echo $product['quantity'];?>" min="1" max="<?php echo $quantity; ?>" 
               onchange="onChangeQuantity(<?php echo $product['drug_id'] ?>,
               <?php echo $patientId ?>,<?php echo $product['pharmacy_id'] ?>)">
    </div>
    <div class="product-removal">
        <form  action="DeleteCartProduct.php" method="post">
            
        
            <input type="hidden" name="drug_id" id="drug_id" value="<?php echo $product['drug_id'];?>">
            <input type="hidden" name="pharmacy_id" id="pharmacy_id" value="<?php echo $product['pharmacy_id'];?>">
        
             
            <button class="remove-product btn-primary" type="submit">
        Remove
      </button>
        </form>
       
    </div>
    <div class="product-line-price"><?php echo $product['totalPrice'];?></div>
  </div>
    
   
<?php

 $totalprice=$totalprice+$product['totalPrice'];
     }
?>
<div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal"><?= $totalprice;?></div>
    </div>
 
  

  </div>
    <form action="checkout.php">
        <button class="checkout" type="submit"> Proceed to Checkout</button>
    </form>
            <?php 
}
?>   
</div> 
        </div>
    </body>
    <!-- footer -->
<?php
include 'footer.php';
    
?> 
</html>
<link rel="stylesheet" href="css/cart.css" type="text/css" />
<script>
    function onChangeQuantity(drugId,patientId,pharamacyId){
        var qty= $('#quantity').val();
           $.post("updateCartQuantityAjax.php", {
            drugId:drugId,
            patientId:patientId,
            pharamacyId:pharamacyId,
            quantity:qty
  },
      
       function( html ) {
             
            if(html == 1){
                window.location.replace("cartView.php");            
            } 
});
    }
</script>
