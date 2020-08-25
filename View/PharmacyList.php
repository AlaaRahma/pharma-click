
<?php

 include_once '../BusinessLogic/Pharmacy_Admin.php';
 

$PharmList = new Pharmacy_Admin();
$result= $PharmList->PharmacyList();

		 $no_of_rows = mysqli_num_rows($result);
		 if ($no_of_rows >0){
	?>
<ul class="dropdown-menu">
<?php

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{  	
         
	?>


						   <li><a href="Pharmacy_Product_List.php?id=<?php echo $row["User_id"];?>"> <?php echo  $row["First_name"]; ?></a></li>
						
						
						<?php 
		
			}
		}
		?>
							</ul>