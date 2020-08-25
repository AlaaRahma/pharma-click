a<?php


    include '../BusinessLogic/Admin.php';
    $Admin = new Admin();
   
    $orderDrugs=$Admin->AdminOrderDrugs($orderId);
    ?>
    <head> 
        <title>Patient Order</title>
    </head>


        <h2>Order Details</h2>     
       <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead class="thead-light">
                <tr>
                    <th scope="col">order ID</th>
                    <th scope="col">Drug ID</th>
                    <th scope="col">Drug Name</th>
                    <th scope="col">pharmacy</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">total price</th>
                    
                    

                </tr>
            </thead>
            <tbody>
                <?php
                
                $numdrugs = count($orderDrugs);
                $counter = 0;
                while ($counter < $numdrugs) {
                  
                    
                    echo '<tr>';
                    echo '<td>' . $orderDrugs[$counter]['order_id'] . '</td>';
                    echo '<td>' . $orderDrugs[$counter]['drug_id'] . '</td>';
                    echo '<td>' . $orderDrugs[$counter]['drug_name'] . '</td>';
                    echo '<td>' .$orderDrugs[$counter]['pharmacy_name'] . '</td>';
                    echo '<td>' .$orderDrugs[$counter]['quantity'] . '</td>';
                    echo '<td>' .$orderDrugs[$counter]['totalPrice'] . '</td>';
                      
                    $counter++;
                }
                ?>

            </tbody>
        </table>
       </div>
    
  
   
     
          
