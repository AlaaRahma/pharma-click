<?php



/**
 * Description of AdminQueries
 *
 * @author Alaa
 */
include_once '../Database/Database.php';
include_once 'OrderQueries.php';
class AdminQueries {
 private $dbObject;
    public function __construct() {
        $this->dbObject= new Database();
    }
 public function  ViewUsersQuery(){
     $query="SELECT User_id,Email, First_name,Last_name,Password,phone_num,nationality,address, city.Name as city, zone.Name as zone,Type_name FROM `user` ,user_type,city,zone where user.User_type=user_type.Type_id and user.User_type <>1"
             . " and user.city_id=city.city_id and user.zone_id=zone.zone_id";
      $result=$this->dbObject->executeQuery($query);
      $data=$this->dbObject->getDataAssocArray($result);
      return $data;
        
}
public function DeleteUserQuery($userId){
    $query="DELETE FROM `user` WHERE `User_id`=$userId ";
     $result=$this->dbObject->executeQuery($query);
   return $result;
    
}
//order management queries

public function ViewPatientOrders (){
    $query="SELECT patient_id, order_id, date,order_status,status_id,status FROM `order`,orderstatus where order.order_status=orderstatus.status_id order by patient_id,order_id";
    $result=$this->dbObject->executeQuery($query);
    $PatientOrders=$this->dbObject->getDataAssocArray($result);
    return $PatientOrders;
}
public function orderCount ($patientId){
    
}
 public function ViewOrderPharmacies ($orderId){
     $query="SELECT count(pharmacy_id)as pharmCount FROM orderdrugs where order_id=$orderId";
     $result=$this->dbObject->executeQuery($query);
     $count=$this->dbObject->getDataAssocArray($result);
     return $count;
 }
 public function UpdateOrderStatus ($orderId,$patientId,$status){
     $query="UPDATE `order` SET `order_status`=$status WHERE patient_id=$patientId and order_id=$orderId";
     $result=$this->dbObject->executeQuery($query);
     if($result){
         return true;
     } 
     else return false; 
 }
 //pharmacy request management queries
 public function ViewRequests (){
     $query="SELECT * FROM `pharmacyreg`";
     $result=$this->dbObject->executeQuery($query);
     $pharm_requests=$this->dbObject->getDataAssocArray($result);
     return $pharm_requests;
 }
public function RegisterPharmUser($email,$pharmName,$password,$phoneNum,$commercial_reg,$license){
    $query="INSERT INTO `user`( `Email`, `First_name`, `Password`, `phone_num`, `nationality`, `User_type`, `approved`) VALUES('$email','$pharmName','$password',$phoneNum,'Egypt',2,1)";
    $result=$this->dbObject->executeQuery($query);
    if($result){
    $lastId=$this->dbObject->GetLastInsertedId();
    
    $query2="INSERT INTO `pharmacy`(`user_id`, `licence`, `commercial_reg`, `visit_counter`) VALUES ($lastId,$license,$commercial_reg,0)";
    $result2=$this->dbObject->executeQuery($query2);
    if ($result2){
        return true;
    }
    else {
        return false;
    }

   }
    
}
public function ViewOneRequest($pharmacyId){
    $query="SELECT * FROM `pharmacyreg` where pharmacy_id=$pharmacyId";
    $result=$this->dbObject->executeQuery($query);
    $OneRequest=$this->dbObject->getDataAssocArray($result);
    return $OneRequest;
}
 public function RejectOrDeletePharmacy($pharmacyId){
     $query="DELETE FROM `pharmacyreg` WHERE pharmacy_id=$pharmacyId";
     $result=$this->dbObject->executeQuery($query);
     if($result){
         return true;
     }
     else return false;
 }
 public function ckeckRegisteredPharmacy ($email){
         $query="select Email from user where Email=$email";
        $result=$this->dbObject->executeQuery($query);
        $Email=$this->dbObject->getDataAssocArray($result);
        return $Email;
     }
     public function OrderDrugs ($orderId,$patientId){
    $query="SELECT orderdrugs.pharmacy_id, orderdrugs.drug_id, orderdrugs.drug_name, orderdrugs.image_path, orderdrugs.pharmacy_name, orderdrugs.quantity, orderdrugs.totalPrice from orderdrugs where order_id=$orderId and patient_id=$patientId";
    $result=$this->dbObject->executeQuery($query);
    $Drugs=$this->dbObject->getDataAssocArray($result);
    return $Drugs;
     }
    public function AdminOrderDrugs ($orderId){
    $query="SELECT orderdrugs.pharmacy_id, orderdrugs.drug_id, orderdrugs.drug_name, orderdrugs.image_path, orderdrugs.pharmacy_name, orderdrugs.quantity, orderdrugs.totalPrice from orderdrugs where order_id=$orderId";
            $result=$this->dbObject->executeQuery($query);
    $Drugs=$this->dbObject->getDataAssocArray($result);
    return $Drugs;
    }
    public function ViewProductList()
{
	
	 $query="SELECT drugs.drug_id, drugs.Drug_Name , drugs.price , sub_category.Sub_Name,category.cat_Name,company.company_name , drug_image.image_path FROM `drugs`
			INNER join drug_contain on drug_contain.drug_id=drugs.drug_id
	        inner join category on drug_contain.cat_id = category.cat_id
	        inner join company on company.company_id=drugs.company_id
            inner join sub_category on sub_category.Sub_id=drug_contain.sub_cat_id
            inner join drug_image on drug_image.drug_id=drugs.drug_id";
    $result=$this->dbObject->executeQuery($query);
 
    return $result;
}
public function SubList()
{
	  $query="SELECT sub_category.*,category.cat_Name FROM sub_category
	 inner join category on category.cat_id=sub_category.Cat_id";
	
    $result=$this->dbObject->executeQuery($query);

	return  $result;
}
public function Add_New_Drug($ProductName,$prescription,$deprecated_drugs,$price,$target_path,$Desc,$Category, $Sub, $Ingredients,$Company,$Form,$tags)
{
	echo $target_path;
	$query="INSERT INTO `drugs`( `Drug_Name`, `prescription`, `deprecated_drugs`, `Desc`, `price`, `company_id`, `form_id`) 
	VALUES ('$ProductName',$prescription,$deprecated_drugs,'$Desc',$price,$Company,$Form)";
	
	$result=$this->dbObject->executeQuery($query);
	
	 if($result){
    $lastId=$this->dbObject->GetLastInsertedId();
	
	//var_dump($lastId);
	$query2="INSERT INTO `drug_component`(`drug_id`, `ingredient_id`) VALUES ($lastId,$Ingredients)";
	$result2=$this->dbObject->executeQuery($query2);
 if($result2){
	$query3="INSERT INTO `drug_contain`(`drug_id`, `cat_id`, `sub_cat_id`) VALUES ($lastId,$Category,$Sub)";
	$result3=$this->dbObject->executeQuery($query3);
	 if($result3)
	 {
	
	echo "INSERT INTO `drug_image`(`image_path`,`drug_id`) VALUES ($target_path,$lastId)";
	
	$query4="INSERT INTO `drug_image`( `image_path`, `drug_id`) VALUES ('$target_path',$lastId)";
		
	$result4=$this->dbObject->executeQuery($query4);
	 if($result4){
	$query5="INSERT INTO `drug_tags`(`drug_id`, `tag_id`) VALUES ($lastId,$tags)";
	 $result5=$this->dbObject->executeQuery($query5);
	  if($result5){
		  return true;
	  }}
	  
	 }
 }
	 }
	 else
	 {
		 return false ;
	 }		 
	
	
}
}

?>