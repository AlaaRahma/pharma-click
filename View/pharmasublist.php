<?php
 include_once '../BusinessLogic/Pharmacy_Admin.php';

//$catid=$_SESSION['id'];
if (isset($_GET['id']))
 {
 // get id value

 $catid=$_GET['id'];

$pharmaid=$_GET['pharmacyid'];
//echo $pharmaid;
 }
//$id=$_SESSION['id'];
$Subcat = new Pharmacy_Admin();
$result= $Subcat->SubCatg($catid);
  $no_of_rows = mysqli_num_rows($result);
  ?>
  <div class="block">
							<h4> Sub-Catagories</h4>
							<div class="list-group">
  <?php
		 if ($no_of_rows >0){
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>

								<a href="PharmaSubCatgList.php?id=<?php echo $row['Sub_id'];?> &phramid= <?php echo $pharmaid; ?>" class="list-group-item">
									<i class="fa  fa-dot-circle-o"></i>
									 <?php echo $row['Sub_Name'];?>
								</a>
														<?php 
}
		 }
?>
							</div>
						</div>