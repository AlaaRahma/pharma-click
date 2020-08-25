<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserQueries
 *
 * @author Alaa
 */
include_once 'Database.php';
class UserQueries {
    private $dbObject;
    public function __construct() {
        $this->dbObject= new Database();

      //  mysqli_escape_string($link, $query);

    }
    
    public function RegisterQuery($firstName,$lastName,$email,$password){
      $firstName=mysqli_real_escape_string($this->dbObject->getConnection(),$firstName);
      $lastName=mysqli_real_escape_string($this->dbObject->getConnection(), $lastName);
      $email=mysqli_real_escape_string($this->dbObject->getConnection(), $email);
        $query="INSERT INTO `user`( `Email`, `First_name`, `Last_name`, `Password`,`User_type`,`city_id`,`zone_id`) VALUES ('$email','$firstName','$lastName','$password',3,1,1)";
        var_dump($query);
        $result= $this->dbObject->executeQuery($query);
        return $result;
    }
     
     public function loginQuery($username,$password){
    
    $query="SELECT * FROM `user` where `Email`='$username' and `Password`='$password'";
    $result=$this->dbObject->executeQuery($query);
    $data=$this->dbObject->getDataAssocArray($result);
    return $data;   
}
    
    public function logoutQuery(){
        session_start(); 
        if(isset($_SESSION['id'])) {
            session_destroy();
            
        }
            
    }

    public function EditProfileQuery ($id,$firstName,$lastName,$password,$nationality,$city_id,$zone_id,$address,$phone_num){
        $query="UPDATE `user` SET `First_name`='$firstName',`Last_name`='$lastName',`Password`='$password',`phone_num`=$phone_num, `nationality`='$nationality', `city_id`=$city_id, `zone_id`=$zone_id,`address`='$address' where `User_id`=$id;";
        $result=  $this->dbObject->executeQuery($query);
        return $result;
    }
    
	
	public function UserInfo($id)
	{
		   $query="SELECT * FROM `user` where `User_id`='$id'";
    $result=$this->dbObject->executeQuery($query);
    //$data=$this->dbObject->getDataAssocArray($result);
    return $data;  
	}
         public function RegisterPharmacy($commercial_reg,$license,$Name,$Email,$password,$phone){
        
             $query="INSERT INTO `pharmacyreg`(`commercial_reg`,`licence`,`Name`,`Email`,`password`,`phoneNum`) VALUES ($commercial_reg,$license,'.$Name.','.$Email.','.$password.',$phone)";
             $result=$this->dbObject->executeQuery($query);
         if ($result)
         return true; 
         else return false;
     }
     //General search for vistors&customers
     public function General_search ($searchItem){
         $query="SELECT has_drugs.drug_id, drugs.Drug_Name, drugs.price , drug_image.image_path, user.User_id ,user.First_name, sub_category.Sub_Name,category.cat_Name,company.company_name,has_drugs.pharmacy_id FROM `drugs`
	
	inner join has_drugs on drugs.drug_id=has_drugs.drug_id  
	inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id 
	INNER join drug_contain on drug_contain.drug_id=drugs.drug_id
	inner join category on drug_contain.cat_id = category.cat_id
	inner join company on company.company_id=drugs.company_id
inner join sub_category on sub_category.Sub_id=drug_contain.sub_cat_id
	inner join user on user.User_id=pharmacy.user_id
         inner join drug_image on drug_image.drug_id=drugs.drug_id
        where drugs.Drug_Name like '%$searchItem%' or drugs.Desc like '%$searchItem%'"
                 . "or category.cat_Name like '%$searchItem%' or sub_category.Sub_Name like '%$searchItem%' or company.company_name like '%$searchItem%' or user.First_name like '%$searchItem%'";
        
         $result=$this->dbObject->executeQuery($query);
         
         $searchResult=$this->dbObject->getDataAssocArray($result);
         return $searchResult;
         
     }
   
     public function searchLocation ($location){
         $query="SELECT has_drugs.drug_id, drugs.Drug_Name, drugs.price ,drug_image.image_path,  user.User_id ,user.First_name, sub_category.Sub_Name,category.cat_Name,company.company_name,has_drugs.pharmacy_id FROM `drugs`
	
	inner join has_drugs on drugs.drug_id=has_drugs.drug_id  
	inner join pharmacy on pharmacy.user_id=has_drugs.pharmacy_id 
	INNER join drug_contain on drug_contain.drug_id=drugs.drug_id
	inner join category on drug_contain.cat_id = category.cat_id
	inner join company on company.company_id=drugs.company_id
inner join sub_category on sub_category.Sub_id=drug_contain.sub_cat_id
	inner join user on user.User_id=pharmacy.user_id
        inner join city on city.city_id=user.city_id
        inner join zone on zone.zone_id=user.zone_id
        inner join drug_image on drug_image.drug_id=drugs.drug_id
        where city.Name like '%$location%' or zone.Name like'%$location%' ";
         $result=$this->dbObject->executeQuery($query);
          $searchResult=$this->dbObject->getDataAssocArray($result);
         return $searchResult;
     }
     public function contactUs ($userId,$usertype,$email,$subject,$message){
         $query="INSERT INTO `contactmessage`(`user_id`, `type`, `Email` , `subject`,`message`) VALUES ($userId,$usertype,'$email','$subject','$message')";
         $result=$this->dbObject->executeQuery($query);
         if ($result){
             return true; 
      
         }
         else return false;
     }
     public function ViewPharmacyDetails($pharmacyId){
         $query="select commercial_reg, licence from pharmacy, user"
                 . " where pharmacy.user_id=user.User_id and pharmacy.user_id=$pharmacyId";
         
         $result=$this->dbObject->executeQuery($query);
         $data=$this->dbObject->getDataAssocArray($result);
         return $data;
     }
     
}

