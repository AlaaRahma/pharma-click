
<?php
 include_once '../BusinessLogic/Pharmacy_Admin.php';

//$catid=$_SESSION['id'];
if (isset($_GET['id']))
 {
 // get id value

 $Pharmid=$_GET['id'];}
 else {
     $Pharmid=$_SESSION['id'];
 }
$pharmacyProducts = new Pharmacy_Admin();
	$result= $pharmacyProducts->CatList();  
	$no_of_rows = mysqli_num_rows($result);
  ?>
  <div class="block">
							<h4> </h4>
							<div class="list-group">
							<h4> Category List</h4>
  <?php
		 if ($no_of_rows >0){
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>

								
										<a href="PharmcyProductsCat.php?id=<?php echo $row["cat_id"];?> & pharmacyid=<?php echo $Pharmid;?> " class="list-group-item">
									<i class="fa  fa-dot-circle-o"></i>
									 <?php echo $row['cat_Name'];?>
								</a>
								</a>
														<?php 
}
		 }
?>
							</div>
						</div>
