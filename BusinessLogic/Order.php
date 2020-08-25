<?php

include_once '../Database/OrderQueries.php';

/**
 * Description of Order
 *
 * @author Alaa
 */
class Order {
    private $OrderQueriesObj;
    public function __construct() {
        $this->OrderQueriesObj= new OrderQueries();
    }
    public function InsertOrder ($patientId,$city,$zone,$address,$phoneNum){
        $result= $this->OrderQueriesObj->InsertOrder($patientId,$city, $zone, $address, $phoneNum);
        return $result;
    }
    public function GetOrderId ($patientId){
        $orderId=  $this->OrderQueriesObj->GetOrderId($patientId);
        return $orderId;
    }
    public function GetOrderAddress ($orderId,$patientId){
        $Address=$this->OrderQueriesObj->GetOrderAddress($orderId, $patientId);
        return $Address;
    }
    public function InsertOrderDrugs ($orderId,$cartDrug){
        $result=$this->OrderQueriesObj->InsertOrderDurg($orderId, $cartDrug);
        return $result;
    }
    public function OrderDetails ($patientId){
        $order_data=$this->OrderQueriesObj->ViewOrderDetails($patientId);
        return $order_data;
    }
    public function OrderDrugDetails ($orderId,$patientId){
        $Drugs=$this->OrderQueriesObj->OrderDrugs($orderId, $patientId);
        return $Drugs;
    }
    public function DeleteOrder ($orderId){
        $Delete=$this->OrderQueriesObj->DeleteOrder($orderId);
        return $Delete;
    }
    public function DeleteOrderDrug($orderId) {
        $DeleteDrugs=$this->OrderQueriesObj->DeleteOrderDrug($orderId);
        return $DeleteDrugs;
    }
    
}
