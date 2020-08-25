<?php

include_once 'Database.php';

/**
 * Description of OrderQueries
 *
 * @author Alaa
 */
class OrderQueries {
    private $dbObject; 
    public function __construct() {
        $this->dbObject= new Database();
    }
    public function InsertOrder($patientId,$city,$zone,$address,$phoneNum)
     {
        if(empty($phoneNum)){
            $phoneNum=0;
        }
       
        $query="INSERT INTO `order`( `order_status`, `new_address`,city_id, zone_id, `new_phoneNum`, `patient_id`) VALUES (1,'$address',$city,$zone,$phoneNum,$patientId)";
        
        $result=$this->dbObject->executeQuery($query);
        if ($result) {
            return true;
        }
        else return false;
    }
    public function GetOrderId ($patientId){
        $query="SELECT max(order_id) as order_id FROM `order` where patient_id=$patientId";
        $result=$this->dbObject->executeQuery($query);
        $orderId=$this->dbObject->getDataAssocArray($result);
        return $orderId['0']['order_id'];
    }
    public function GetOrderAddress ($orderId,$patientId){
        $query="SELECT `order`.new_address,city.Name as City, zone.Name as Zone"
                . " from `order`, zone, city "
                . "WHERE `order`.city_id=city.city_id and"
                . " `order`.zone_id=zone.zone_id and "
                . "`order`.order_id=$orderId and "
                . "order.patient_id=$patientId";
        
        $result=$this->dbObject->executeQuery($query);
        $orderAddress=$this->dbObject->getDataAssocArray($result);
        return $orderAddress;
    }
    public function InsertOrderDurg ($orderId,$cartdrug){
        
        
        foreach ($cartdrug as $product) {
            
        
        $query="INSERT INTO `orderdrugs`(`order_id`, `drug_id`, `pharmacy_id`, `patient_id`,`drug_name`, `pharmacy_name`, `quantity`, `totalPrice`,`image_path`) VALUES ($orderId,".$product['drug_id'].",".$product['pharmacy_id'].",".$product['patient_id'].",'".$product['Drug_Name']."','".$product['Pharmacy']."',".$product['quantity'].",".$product['totalPrice'].",'".$product['image_path']."')";
        $result=$this->dbObject->executeQuery($query); 
        
        }
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function ViewOrderDetails ($patientId){
        $query="SELECT `order_id`,`order_status`, `new_address`, `new_phoneNum`, date, status FROM `order`, orderstatus where order.order_status=orderstatus.status_id and patient_id=$patientId";
        $result=$this->dbObject->executeQuery($query);
        $order=$this->dbObject->getDataAssocArray($result);
        return $order;
    }
    public function OrderDrugs ($orderId,$patientId){
    $query="SELECT orderdrugs.pharmacy_id, orderdrugs.drug_id, orderdrugs.drug_name, orderdrugs.image_path, orderdrugs.pharmacy_name, orderdrugs.quantity, orderdrugs.totalPrice from orderdrugs where order_id=$orderId and patient_id=$patientId";
    $result=$this->dbObject->executeQuery($query);
    $Drugs=$this->dbObject->getDataAssocArray($result);
    return $Drugs;
    }
    public function DeleteOrder($orderId){
        $query="DELETE FROM `order` WHERE order_id=$orderId";
        $result=$this->dbObject->executeQuery($query);
        if($result)
            return true;
        else return false;
        
    }
    public function DeleteOrderDrug ($orderId){
        $query="Delete FROM orderdrugs WHERE order_id=$orderId";
        $result=$this->dbObject->executeQuery($query);
        if($result) 
            return true;
        else return false;
    }
   
}
