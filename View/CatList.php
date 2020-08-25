
<?php

 include_once '../BusinessLogic/Pharmacy_Admin.php';
 

$catList = new Pharmacy_Admin();
$result= $catList->CatList();

		 $no_of_rows = mysqli_num_rows($result);
		 if ($no_of_rows >0){
	?>
<ul class="dropdown-menu">
<?php

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{  	
          if(!isset($_SESSION['id']))
         {
	?>


						   <li><a href="Cat_Products_List.php?id=<?php echo $row["cat_id"];?>"> <?php echo  $row["cat_Name"]; ?></a></li>
						
						
						<?php 
		 } else 
		 {
			  if ($_SESSION['user_type']==2)
			  {?>
				    <li><a href="PharmcyProductsCat.php?id=<?php echo $row["cat_id"];?> & pharmacyid=<?php echo $_SESSION['id']?> "> <?php echo  $row["cat_Name"]; ?></a></li>
			<?php
			}
			  else 
			  {?>
		   <li><a href="Cat_Products_List.php?id=<?php echo $row["cat_id"];?>"> <?php echo  $row["cat_Name"]; ?></a></li>
				  
			<?php  }
		 }
			}
		}
		?>
							</ul>