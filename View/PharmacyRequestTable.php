<?php
    include '../BusinessLogic/Admin.php';
    $Admin = new Admin();
    $pharmacyRequests=$Admin->ViewRequests();
    ?>
    <head> 
        <title>pharmacy Request</title>
    </head>


    <h2>Registration Requests</h2> <br>   
       <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead class="thead-light">
                <tr>
                    <th scope="col">pharmacy ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">commercial Register</th>
                    <th scope="col">License</th>
                    <th scope="col">Email</th>
                    <th scope="col">password</th>
                     <th scope="col">phone Number</th>
                     <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $numRequest = count($pharmacyRequests);
                $counter = 0;
                while ($counter < $numRequest) {
//                    $pharmRequestId=$pharmacyRequests[$counter]['pharmacy_id'];

                    echo '<tr>';
                    echo '<td>' .$pharmacyRequests[$counter]['pharmacy_id'] . '</td>';
                    echo '<td>' . $pharmacyRequests[$counter]['Name'] . '</td>';
                    echo '<td>' . $pharmacyRequests[$counter]['commercial_reg'] . '</td>';
                    echo '<td>'.$pharmacyRequests[$counter]['licence'].'</td>';
                    echo '<td>'.$pharmacyRequests[$counter]['Email'].'</td>';
                    echo '<td>'.$pharmacyRequests[$counter]['password'].'</td>';
                    echo '<td>'.$pharmacyRequests[$counter]['phoneNum'].'</td>';
                    echo '<td> <a href= "AcceptPharmacyRequest.php?pharm_Id='.$pharmacyRequests[$counter]['pharmacy_id'].'" >Accept</a>'
                            . ' /<a href="RejectDeletePharmacyRequest.php?pharmId='.$pharmacyRequests[$counter]['pharmacy_id'].'">Reject</a> </td>';
                    echo '</tr>';
                    $counter++;
                }
                ?>

            </tbody>
        </table>
       </div>
    
