<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DrugQueries
 *
 * @author Omnia
 */
 include_once 'Database.php';
class DrugQueries {
    private $dbObject;
    public function __construct() {
        $this->dbObject= new Database();
      //  mysqli_escape_string($link, $query);
    }
	// msh mknhom 
	public function ViewProductListHome(){
		$return_arr = array();
	
	
	$query="SELECT drugs.drug_id, drugs.Drug_Name , drugs.price ,  user.User_id , sub_category.Sub_Name,category.cat_Name,company.company_name , drug_image.image_path FROM `drugs`
	
	inner join has_drugs on drugs.drug_id=has_drugs.drug_id 
	inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id 
	INNER join drug_contain on drug_contain.drug_id=drugs.drug_id
	inner join category on drug_contain.cat_id = category.cat_id
	inner join company on company.company_id=drugs.company_id

inner join sub_category on sub_category.Sub_id=drug_contain.sub_cat_id
	inner join user on user.User_id=pharmacy.user_id 
    inner join drug_image on drug_image.drug_id=drugs.drug_id Limit 8";
$result=$this->dbObject->executeQuery($query);
$productDetails=$this->dbObject->getDataAssocArray($result);

            	return $productDetails;
			
        }
        
		 


	
	public function ViewProductDetails($drug_id, $phramid)
	
	{
				$return_arr = array();
		$query="SELECT drugs.drug_id, drugs.Drug_Name , drugs.price , drug_form.form_type,sub_category.Sub_Name,user.User_id,drugs.Desc,drugs.prescription,drugs.deprecated_drugs ,active_ingredients.Name,category.cat_Name,drug_image.image_path,company.company_name,user.First_name FROM `drugs` 

INNER join drug_contain on drug_contain.drug_id=drugs.drug_id
inner join drug_component on drug_component.drug_id=drugs.drug_id
inner join active_ingredients on drug_component.ingredient_id = active_ingredients.id
inner join category on drug_contain.cat_id = category.cat_id
inner join has_drugs on drugs.drug_id=has_drugs.drug_id
inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id
inner join user on user.User_id=pharmacy.user_id
inner join company on company.company_id=drugs.company_id
	inner join drug_form on drug_form.form_id=drugs.form_id
inner join sub_category on sub_category.Sub_id=drug_contain.sub_cat_id
inner join drug_image on drug_image.drug_id=drugs.drug_id
where drugs.drug_id=$drug_id and user.User_id=$phramid";
//echo $query;
$result=$this->dbObject->executeQuery($query);
$product=$this->dbObject->getDataAssocArray($result);
return $product;
		 	
	}
	

	public function All_Drug_List()
	{
		$query="SELECT `drug_id`, `Drug_Name` FROM `drugs`";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
	}
	public function Get_Products_Cat( $catid)
				{
				
$query="SELECT  drugs.drug_id, drugs.Drug_Name , drugs.price , company.company_name,user.First_name  , company.company_id ,drug_image.image_path , user.User_id , category.cat_Name FROM `drugs`
inner join company on company.company_id=drugs.company_id
inner join has_drugs on drugs.drug_id=has_drugs.drug_id
inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id
inner join drug_contain on drug_contain.drug_id=drugs.drug_id
inner join user on user.User_id=pharmacy.user_id
inner join drug_image on drug_image.drug_id=drugs.drug_id
inner Join category on category.cat_id=drug_contain.cat_id
WHERE  drug_contain.cat_id=$catid";					
	//echo $query;
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
                      public function Get_Products_tags()
				{
					$query="SELECT * FROM `tags` ";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function Get_Offers()
				{
					$query="SELECT drugs.drug_id,user.User_id, drugs.Drug_Name,user.First_name,offer.newprice,drugs.price,drug_image.image_path  FROM `offer`
inner join user on user.User_id=offer.pharmacy_id
inner join drugs on drugs.drug_id=offer.drug_id
inner join offer_type on offer_type.type_id=offer.type_id
inner join drug_image on drug_image.drug_id=drugs.drug_id ";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function Get_Cat_Name($cat_id)
				{
					$query="SELECT category.cat_Name from category where category.cat_id=$cat_id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
			public function Get_Sub_Name($sub_id)
				{
					$query="SELECT sub_category.Sub_Name FROM sub_category where sub_category.Sub_id=$sub_id";
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
				}
				public function Get_Sub_Products($subid)
				{
$query="SELECT  drugs.drug_id, drugs.Drug_Name , drugs.price , company.company_name,user.First_name  , company.company_id ,drug_image.image_path , user.User_id , category.cat_Name FROM `drugs`
inner join company on company.company_id=drugs.company_id
inner join has_drugs on drugs.drug_id=has_drugs.drug_id
inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id
inner join drug_contain on drug_contain.drug_id=drugs.drug_id
inner join user on user.User_id=pharmacy.user_id
inner join drug_image on drug_image.drug_id=drugs.drug_id
inner Join category on category.cat_id=drug_contain.cat_id
WHERE  drug_contain.sub_cat_id=$subid";					
	//echo $query;
      $result=$this->dbObject->executeQuery($query);
     // $data=$this->dbObject->executeQueryArray1($result);
      //return $data;

             	return $result;
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

	