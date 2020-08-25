<?php 

session_start();
 include_once '../BusinessLogic/drug.php';
 $return_arr = array();
 $arr=array();
$productinfo = new drug();

  $arr= $productinfo->View_drug();
  echo json_encode($arr);
  return $arr;
//echo$arr;
 /*  $no_of_rows = mysqli_num_rows($data);
	   
 if ($no_of_rows > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
				$row_array['id'] = $row['drug_id'];
    				$row_array['name'] = $row['Drug_Name'];
					$row_array['price'] = $row['price'];
					array_push($return_arr,$row_array);
            }
            	return $return_arr;
        }
        else//No items found
        {
        return false;
        } */
?>