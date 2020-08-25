<?php

/**
 * Description of pharmacyQueries
 *
 * @author Alaa
 */

include_once 'Database.php';

class pharmacyQueries {
  private  $dbObject;
  public function __construct() {
      $this->dbObject=new Database();
  }
  public function GetDrugQuantity($drgId,$pharmacyId){
      $query="SELECT `quantity` FROM `has_drugs` WHERE drug_id=$drgId AND pharmacy_id=$pharmacyId";
      $result=$this->dbObject->executeQuery($query);
      $quantity=$this->dbObject->getDataAssocArray($result);
      return $quantity[0]['quantity'];
      
  }


  
 	public function CategoryList(){
		$return_arr = array();
	$query="SELECT * FROM `category`";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
}
//updated
public function GetPharmacyProducts($id)
{	$return_arr = array();
	$query="SELECT  has_drugs.quantity,sub_category.Sub_Name,sub_category.Sub_id,category.cat_id,category.cat_Name, drug_image.image_path,drugs.drug_id, user.User_id,drugs.Drug_Name , drugs.price , company.company_name,user.First_name  , company.company_id FROM `drugs`
inner join company on company.company_id=drugs.company_id
inner join has_drugs on drugs.drug_id=has_drugs.drug_id
inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id
inner join user on user.User_id=pharmacy.user_id
inner join drug_image on drug_image.drug_id=drugs.drug_id
inner join drug_contain on drug_contain.drug_id=drugs.drug_id
inner join category on category.cat_id=drug_contain.cat_id
inner join sub_category on sub_category.Sub_id=drug_contain.sub_cat_id
WHERE user.User_id=$id";

      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				
				
				
				public function AddPharmacyDrug($drgId, $pharmacyId, $quantity)
				{
						$query="INSERT INTO `has_drugs`(`pharmacy_id`, `drug_id`, `quantity`) VALUES ($pharmacyId,$drgId,$quantity)";
						//echo $query;
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function GetPharmacy_Products_Cat($id, $catid)
				{
$query="SELECT drug_image.image_path,drugs.drug_id,  drugs.Drug_Name , drugs.price , company.company_name,user.First_name  , company.company_id FROM `drugs`
inner join company on company.company_id=drugs.company_id
inner join has_drugs on drugs.drug_id=has_drugs.drug_id
inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id
inner join drug_contain on drug_contain.drug_id=drugs.drug_id
inner join user on user.User_id=pharmacy.user_id
inner join drug_image on drug_image.drug_id =drugs.drug_id
WHERE user.User_id=$id and drug_contain.cat_id=$catid";					
	//echo $query;
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				 	public function OfferType(){
		$return_arr = array();
	$query="SELECT * FROM `offer_type`";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
}
public function Sub_Catg($catid)
				{
					$query="SELECT * FROM `sub_category` where Cat_id=$catid";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function Pharmacy_Offer_to_Add($DrgID,$pharmacyID,$Quantity,$price,$timefrom,$timeto,$dsc,$offer)
				{
			
				$query="INSERT INTO `offer`( `pharmacy_id`, `drug_id`, `type_id`, `newprice`, `time_from`, `time_to`, `quantity`, `description`)
				VALUES ($pharmacyID,$DrgID,$offer,$price,'$timefrom','$timeto',$Quantity,'$dsc')";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;	
				}
				public function FormType()
				{
				$query="SELECT * FROM `drug_form` ";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;	
				}
				public function CompanyNames()
				{
				$query="SELECT * FROM `company` ";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;	
				}
				public function ActiveIng()
				{
						$query="SELECT * FROM `active_ingredients` ";
				 $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;		
				}
				public function PharmacyOffers($id)
				{
					$query=	"SELECT drug_image.image_path,offer.drug_id,offer.pharmacy_id, offer.newprice,drugs.Drug_Name,drugs.price    FROM `offer`
inner join drugs on drugs.drug_id=offer.drug_id

inner join user on user.User_id=offer.pharmacy_id
INNER join drug_image on drug_image.drug_id=drugs.drug_id

WHERE user.User_id=$id";
 $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;	
				}
					public function PharmacyList(){
		$return_arr = array();
	$query="SELECT user.User_id,user.First_name FROM `user` WHERE user.User_type=2";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
}
				public function Get_Product_List($id)
				{
					$query="SELECT drugs.drug_id, drugs.Drug_Name FROM drugs WHERE NOT EXISTS(SELECT * FROM has_drugs WHERE has_drugs.drug_id=drugs.drug_id and has_drugs.pharmacy_id=$id )";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function Get_Pharmacy_Offer_List($id)
				{
				$query="SELECT offer_type.*,offer.*,drugs.* FROM `offer` 
inner join drugs on drugs.drug_id=offer.drug_id
inner join offer_type on offer_type.type_id=offer.type_id
where offer.pharmacy_id=$id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;	
				}

		public function PharmacyNames($id){


	$query="SELECT user.First_name FROM `user` WHERE user.User_id=$id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
}
	public function PharmacySub($subid, $pharmaid)
				{
			
	
$query="SELECT  drugs.drug_id, drugs.Drug_Name , drugs.price , company.company_name,user.First_name  , company.company_id ,drug_image.image_path , user.User_id , category.cat_Name FROM `drugs`
inner join company on company.company_id=drugs.company_id
inner join has_drugs on drugs.drug_id=has_drugs.drug_id
inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id
inner join drug_contain on drug_contain.drug_id=drugs.drug_id
inner join user on user.User_id=pharmacy.user_id
inner join drug_image on drug_image.drug_id=drugs.drug_id
inner Join category on category.cat_id=drug_contain.cat_id
WHERE  drug_contain.sub_cat_id=$subid and  user.User_id=$pharmaid";					
	//echo $query;
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function PharmacyBranch($BranchName,$pharmacyID,$City,$Zone,$Address,$Phone,$GoogleURL)
				{
					
					
					$query="INSERT INTO `pharmacy_branch`( `branch_name`,`phramacy_id`, `city_id`, `zone_id`, `address`, `phone`, `branch_url`) VALUES
					('$BranchName',$pharmacyID,$City,$Zone,'$Address','$Phone','$GoogleURL')";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;	
				}
				public function Get_PharmacyBranches($id)
				{
					$query="SELECT pharmacy_branch.branch_id, pharmacy_branch.branch_name , pharmacy_branch.address,pharmacy_branch.phone,pharmacy_branch.branch_url ,city.Name as cityname,zone.Name as zonename FROM `pharmacy_branch` 
inner join city on city.city_id =pharmacy_branch.city_id
inner join zone on zone.zone_id =pharmacy_branch.zone_id 
where pharmacy_branch.phramacy_id =$id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function Delete_PharmacyBranch($branch_id) 
				{
				$query="DELETE FROM `pharmacy_branch` WHERE pharmacy_branch.branch_id=$branch_id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;	
				}
				public function Delete_Pharmacyoffer($offer_id)
				{
					$query="DELETE FROM `offer` WHERE offer.offer_id=$offer_id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function Delete_Pharmacyproduct($drug_id,$pharma_id)
				{
					$query="DELETE FROM `has_drugs` WHERE has_drugs.drug_id= $drug_id and has_drugs.pharmacy_id= $pharma_id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function Pharmacyorder($id)
				{
					$query="SELECT `orderdrugs`.`order_id`, `orderdrugs`.`drug_id`, `orderdrugs`.`patient_id`,`orderdrugs`.`drug_name`,`orderdrugs`.`image_path`, `orderdrugs`.`pharmacy_name`,`orderdrugs`.`quantity`, `orderdrugs`.`totalPrice`,`user`.`First_name`,`orderstatus`.`status`,`order`.`new_address`
FROM `orderdrugs`
inner join `user` on`user`.`User_id`=`orderdrugs`.`patient_id`
INNER join `order`on `order`.`order_id`=`orderdrugs`.`order_id`
INNER JOIN `orderstatus` on `orderstatus`.`status_id`=`order`.`order_status`
where  `pharmacy_id`=$id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
					 public function OrderPharmaDrugs($orderId,$pharmacyId, $patientId){
	
    $query="SELECT `order_id`, `drug_id`, `pharmacy_id`, `patient_id`, `drug_name`, `image_path`, `pharmacy_name`, `quantity`, `totalPrice` FROM `orderdrugs`  where  order_id=$orderId and patient_id= $patientId and pharmacy_id =$pharmacyId";
    $result=$this->dbObject->executeQuery($query);
    return $result;
    }
	 public function OrderPharma($orderId,$patientId){
  $query="SELECT `order_id`, `patient_id`, `order_status`, `new_address`, `city`.`Name` as cityname, `zone`.`Name` as zonename, `new_phoneNum`, `date` ,`orderstatus`.`status` FROM `order` 
inner join 
city on city.city_id =`order`.`city_id`
inner join zone on zone.zone_id=`order`.`zone_id`
INNER JOIN `orderstatus` on `orderstatus`.`status_id`=`order`.`order_status`where  order_id=$orderId and patient_id=$patientId ";
    $result=$this->dbObject->executeQuery($query);

    return $result;
    }
public function GetOrder_Pharma_Count($orderId)
{
	
	 $query="select  count(order_id)   as count FROM `orderdrugs`  where order_id=$orderId";
    $result=$this->dbObject->executeQuery($query);
    return $result;
}
public function updatepharmaorderstatus($orderId, $patientId,$status)
{
	//echo "UPDATE `order` SET `order_status`=$status WHERE patient_id=$patientId and order_id=$orderId  ";
		 $query="UPDATE `order` SET `order_status`=$status WHERE patient_id=$patientId and order_id=$orderId  ";
    $result=$this->dbObject->executeQuery($query);
    return $result;
}

public function getofferdata($offerid) 
{
	 $query="select offer.* , offer_type.* ,drugs.Drug_Name
from offer
INNER join offer_type on offer_type.type_id=offer.offer_id
inner join drugs on drugs.drug_id=offer.drug_id
where offer.offer_id=$offerid";
  $result=$this->dbObject->executeQuery($query);
    return $result;
}
public function editoffer($Quantity,$price,$timefrom,$timeto,$dsc,$offerID)
{

/* 	echo "UPDATE `offer` SET `newprice`=$price,`quantity`=$Quantity,`description`='$dsc',`time_from`='$timefrom',`time_to`='$timeto'
where offer.offer_id =$offerID"; */
	$query="UPDATE `offer` SET `newprice`=$price,`quantity`=$Quantity,`description`='$dsc',`time_from`='$timefrom',`time_to`='$timeto'
where offer.offer_id =$offerID";
  $result=$this->dbObject->executeQuery($query);
    return $result;
}
public function getpharmacyProductsDetails($drug_id,$id)
{
	//echo "select drugs.Drug_Name , has_drugs.quantity FROM has_drugs inner join drugs on drugs.drug_id=has_drugs.drug_id  WHERE has_drugs.drug_id=$drug_id and has_drugs.pharmacy_id=$id";
			
	$query="select drugs.Drug_Name , has_drugs.quantity FROM has_drugs inner join drugs on drugs.drug_id=has_drugs.drug_id  WHERE has_drugs.drug_id=$drug_id and has_drugs.pharmacy_id=$id";
				 $result=$this->dbObject->executeQuery($query);	
				 return $result; 
}
public function editproductpharmacy($Quantity,$product_id,$id)
{ //echo "UPDATE `has_drugs` SET `quantity`=$Quantity WHERE  has_drugs.drug_id =$product_id and has_drugs.pharmacy_id=$id ";
	$query="UPDATE `has_drugs` SET `quantity`=$Quantity WHERE  has_drugs.drug_id =$product_id and has_drugs.pharmacy_id=$id ";
  $result=$this->dbObject->executeQuery($query);
    return $result;
}
}
