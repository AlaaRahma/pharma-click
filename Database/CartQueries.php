<?php

/**
 * Description of CartQueries
 *
 * @author Alaa
 */
include_once 'Database.php';
class CartQueries {
    
    private $dbObject;
    public function __construct() {
      $this->dbObject=new Database();
    }
   public function Insert_record ($drgId,$pharmacyId, $patientId) {
       $price=$this->getDrugPrice($drgId);
       $query="INSERT INTO `cart`( `drug_id`,`quantity`,`totalPrice`,`patient_id`,`pharmacy_id`) VALUES ($drgId,1,$price,$patientId,$pharmacyId)";
       $result=$this->dbObject->executeQuery($query);
       if($result){
           return true;
       }
       else return false;
   }
    public function getDrugPrice($drgId){
        $query="SELECT price FROM `drugs` where drug_id=$drgId";
        $result=$this->dbObject->executeQuery($query);
        $data=$this->dbObject->getDataAssocArray($result);
        return $data[0]['price']; 
    }
   public function Updatequantity ($quantity,$patientId,$drgId,$pharmacyId){
       $price=$this->getDrugPrice($drgId);
       $totalPrice=$price * $quantity;
       $query="UPDATE  `cart` SET `quantity` =$quantity,`totalPrice`=$totalPrice WHERE drug_id=$drgId and patient_id=$patientId and pharmacy_id=$pharmacyId";
       $result= $this->dbObject->executeQuery($query);
       if ($result) {
           return true;
       }
       else return false;
   }
   //Product number in a patient Cart
   public function CountProduct ($patientId){
       $query="SELECT COUNT(`drug_id`) as count FROM `cart` WHERE `patient_id` =$patientId";
       $result= $this->dbObject->executeQuery($query);
       $data=$this->dbObject->getDataAssocArray($result);
       return $data[0]['count']; 
       
   }
   public function ViewCartDetails ($patientId){
       $query="select drugs.drug_id,drug_image.image_path,drugs.Drug_Name, "
               . "drugs.price,drugs.Desc, user.First_name AS Pharmacy, company.company_name as Company,"
               . " cart.quantity,cart.totalPrice,cart.pharmacy_id,cart.patient_id, has_drugs.pharmacy_id from drugs, user, pharmacy, company, cart, has_drugs, "
               . "drug_image where cart.drug_id=drugs.drug_id and user.User_id=pharmacy.user_id "
               . "and pharmacy.user_id=has_drugs.pharmacy_id AND drugs.company_id=company.company_id "
               . "AND has_drugs.drug_id=cart.drug_id and drug_image.drug_id=drugs.drug_id and cart.pharmacy_id= has_drugs.pharmacy_id"
               . " and cart.patient_id=$patientId";
       $result= $this->dbObject->executeQuery($query);
       $ProdCart= $this->dbObject->getDataAssocArray($result);
       return $ProdCart;
   }
   public function DeleteProductCart($prodId,$patientId,$pharmacyId){
       $query="DELETE FROM `cart` WHERE drug_id=$prodId and patient_id=$patientId and pharmacy_id=$pharmacyId";
       $result= $this->dbObject->executeQuery($query);
             return $result;
     
   }
 
   
   public function DisableAdd ($drgId,$patientId,$pharmacyId){
       $query="SELECT * FROM `cart` where `patient_id`=$patientId and `pharmacy_id`=$pharmacyId and `drug_id`=$drgId";
       $dataRows=$this->dbObject->executeQueryRownumber($query);
       if($dataRows ==1){
           return true;
       }
       else{
           return false;
       }
   }
   public function DeleteCartOrder ($patientId){
       $query="DELETE FROM `cart` WHERE patient_id=$patientId";
       $result=$this->dbObject->executeQuery($query);
       if ($result)
           return true;
       else return false;
   }
}

