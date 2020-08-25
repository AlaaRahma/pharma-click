<?php
 include_once '../BusinessLogic/Pharmacy_Admin.php';

if (isset($_GET['id']))
 {
 $id = $_GET['id'];
 }
 $i=1;
$branchlist= new Pharmacy_Admin();
$result= $branchlist->PharmacyBranches($id);

 $no_of_rows = mysqli_num_rows($result);
?>

<div class="col-md-9">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
						
						<li><a href="" data-toggle="tab">Branches </a></li>
					</ul>
<?php  

$a = 1;
 if ($no_of_rows >0)
		 {
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="">
							<p><?php  echo $a  ;
							?>
							Branch - <?php  echo $row ['branch_name'] ; ?>  - <?php echo $row ['cityname'] ; ?>  - <?php echo  $row ['zonename'] ;?>  - <?php echo  $row ['address'] ;?>  - Phone number :<?php echo $row ['phone'] ; ?>
							
							
						<a href="<?php  echo $row ['branch_url'] ;?>" 
  target="popup" 
  onclick="window.open('<?php  echo $row ['branch_url'] ;?>','popup','width=600,height=600'); return false;">
    Location on Google Map 
</a>
						
</p>
						</div>
						
					</div>
		 <?php 
 $a++;		 }
		
		 
		 }?>
				</div>	<!-- End of /.col-md-9 -->