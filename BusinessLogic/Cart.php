<?php

/**
 * Description of Cart
 *
 * @author Alaa
 */
 
include_once '../Database/CartQueries.php';
class Cart {
  private  $CartQueriesObj;
  public function __construct() {
      $this->CartQueriesObj= new CartQueries();
  }
  public function InsertCart($drgId,$pharmacyId,$patientId){
      $result= $this->CartQueriesObj->Insert_record($drgId,$pharmacyId, $patientId);
      return $result; 
  }
  public function CountDrugs ($patientId) {
      $DrugCount= $this->CartQueriesObj->CountProduct($patientId);
      return $DrugCount;
  }
  public function ViewCart ($patientId) {
      $patientCart= $this->CartQueriesObj->ViewCartDetails($patientId);
      return $patientCart;
  }
  public function UpdateQuantity($quantity,$patientId,$drgId,$pharmacyId){
      $updated=$this->CartQueriesObj->Updatequantity($quantity, $patientId, $drgId,$pharmacyId);
      return $updated;
  }
  public function DeleteDrug($drgId,$patientId,$pharmacyId) {
      $result= $this->CartQueriesObj->DeleteProductCart($drgId,$patientId,$pharmacyId);
      return $result;
      
  }
  public function TotalPrice($patientId) {
      $result=  $this->CartQueriesObj->TotalPrice($patientId);
      return $result;
      
  }
  public function DisableAdd ($drgId,$patientId,$pharmacyId){
      $result=$this->CartQueriesObj->DisableAdd($drgId, $patientId, $pharmacyId);
      return $result; 
  }
  public function DeleteCartOrder ($patientId){
      $Deleted=$this->CartQueriesObj->DeleteCartOrder($patientId);
      return $Deleted;
  }
}
