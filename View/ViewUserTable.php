    <?php
   
    include '../BusinessLogic/Admin.php';
    include '../BusinessLogic/Address.php';
    $Admin = new Admin();
    $Users = $Admin->View_users();
      
    ?>
    <head> 
        <title>User list</title>
    </head>


        <h2>Users List</h2>     
       <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead class="thead-light">
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">First_name</th>
                    <th scope="col">Last_name</th>
                    <th scope="col">Password</th>
                    <th scope="col">City</th>
                    <th scope="col">Zone</th>
                    <th scope="col">Phone_number</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">User type</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $numUsers = count($Users);
                $counter = 0;
                while ($counter < $numUsers) {
                    echo '<tr>';
                    echo '<td>' . $Users[$counter]['User_id'] . '</td>';
                    echo '<td>' . $Users[$counter]['Email'] . '</td>';
                    echo '<td>' . $Users[$counter]['First_name'] . '</td>';
                    echo '<td>' . $Users[$counter]['Last_name'] . '</td>';
                    echo '<td>' . $Users[$counter]['Password'] . '</td>';
                    echo '<td>' . $Users[$counter]['city'] . '</td>';
                    echo '<td>' . $Users[$counter]['zone'] . '</td>';
                    echo '<td>' . $Users[$counter]['phone_num'] . '</td>';
                    echo '<td>' . $Users[$counter]['nationality'] . '</td>';
                    echo '<td>' . $Users[$counter]['Type_name'] . '</td>';
                    echo '<td> <a href= "DeleteAjax.php?userId='.$Users[$counter]['User_id'].'" >Delete</a> </td>';
                    echo '</tr>';
                    $counter++;
                }
                ?>

            </tbody>
        </table>
       </div>
    
  
   














