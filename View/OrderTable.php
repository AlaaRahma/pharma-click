<?php


    include '../BusinessLogic/Admin.php';
    $Admin = new Admin();
    $orders=$Admin->PatientOrders();
    ?>
    <head> 
        <title>Patient Order</title>
    </head>


        <h2>Order Table</h2>     
       <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead class="thead-light">
                <tr>
                    <th scope="col">patient ID</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Change status</th>
                    <th scope="col">More details</th>
                    <th scope="col">Action</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php
                $numOrders = count($orders);
                $counter = 0;
                while ($counter < $numOrders) {
                    $orderId=$orders[$counter]['order_id'];
                    $PharmacyCount=$Admin->OrderPharmacyCount($orderId);
                    $max=1;
                    if($PharmacyCount[0]['pharmCount']>1){
                        $max=3;
                    }
                    echo '<tr>';
                    echo '<td>' . $orders[$counter]['patient_id'] . '</td>';
                    echo '<td>' . $orders[$counter]['order_id'] . '</td>';
                    echo '<td>' . $orders[$counter]['date'] . '</td>';
                    echo '<td>' . $orders[$counter]['status'] . '</td>';
                    echo '<td><form method="post"><input type="number" min="1" id="status'.$orders[$counter]['order_id'].$orders[$counter]['patient_id'].'"  value="'.$orders[$counter]['order_status'].'" onchange="onChangeStatus('.$orders[$counter]['order_id'].','.$orders[$counter]['patient_id'].')"'
                    . ' max="'.$max.'">'
                            . '<input type="hidden" name="orderId" id="orderId" value="'.$orders[$counter]['order_id'].'">'
                            . '<input type="hidden" name="patient_id" id="patient_id" value="'.$orders[$counter]['patient_id'].'"></form></td>';
                    
                    echo '<td> <a href="AdminOrderDetails.php?orderId='.$orders[$counter]['order_id'].'">Order Details </a> </td>';
                    
                    echo '<td> <a href= "AdminDeleteOrder.php?orderId='.$orders[$counter]['order_id'].'" >Delete</a> </td>';
                    echo '</tr>';
                    $counter++;
                }
                ?>

            </tbody>
        </table>
       </div>
    
  
   
        <script>
           
            
             function onChangeStatus(orderId,PatientId){
            var status= $('#status'+orderId+PatientId).val();
           $.post("UpdateOrderStatusAjax.php", {
            OrderId:orderId,
            PatientId:PatientId,
            Status:status
  },
      
       function( html ) {
             
            if(html == 1){
                window.location.replace("AdminOrderDrugs.php");            
            } 
});
    }
        </script>
            
          
