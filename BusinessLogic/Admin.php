<?php

/**
 * Description of Admin
 *
 * @author Alaa
 */
include_once 'User.php';
include '../Database/AdminQueries.php';
class Admin extends User {
    private $AdminQueriesObj;
    private $userObj;
    public function __construct() {
        $this->userObj=new User();
        $this->AdminQueriesObj= new AdminQueries();
    }

    public function Delete_user ($userId){
        $result=$this->AdminQueriesObj->DeleteUserQuery($userId);
        if($result){
            return true;
        }
        else {
            return false;
        }
    }
    public function View_users (){
        $Users=$this->AdminQueriesObj->ViewUsersQuery();
        return $Users;

    }
    public function PatientOrders (){
        $Orders=$this->AdminQueriesObj->ViewPatientOrders();
        return $Orders;
    }
    
    public function OrderPharmacyCount ($orderId){
        $Count=$this->AdminQueriesObj->ViewOrderPharmacies($orderId);
        return $Count;
    }
    public function UpdateOrderStatus ($orderId,$patientId,$status){
        $Update=$this->AdminQueriesObj->UpdateOrderStatus($orderId, $patientId, $status);
        return $Update;
    }
   public function ViewRequests (){
       $pharmacyRequests=$this->AdminQueriesObj->ViewRequests();
       return $pharmacyRequests;
   }
   public function RegisterPharmacyUser($email, $pharmName, $password, $phoneNum, $commercial_reg, $license){
       $Accepted=$this->AdminQueriesObj->RegisterPharmUser($email,$pharmName, $password, $phoneNum, $commercial_reg, $license);
       return $Accepted;
   }
   public function RejectOrDeletePharmacy ($pharmacyId){
       $Rejected=$this->AdminQueriesObj->RejectOrDeletePharmacy($pharmacyId);
         return $Rejected;      
   }
   public function ViewOneRequest ($pharmacyId){
       $oneRequest=$this->AdminQueriesObj->ViewOneRequest($pharmacyId);
       return $oneRequest;
   }
   public function checkRegisteredPharmacy ($email){
        $Registered=$this->userQueriesObj->ckeckRegisteredPharmacy($email);
        return $Registered;
    }
    public function AdminOrderDrugs ($orderId){
        $Details=$this->AdminQueriesObj->AdminOrderDrugs($orderId);
        return $Details;
    }
    public function ProductList()
	{
		$result=$this->AdminQueriesObj->ViewProductList();
        return $result;
	}
	public function DeleteProduct($drugID)
	{
$result=$this->AdminQueriesObj->DeleteProduct($drugID);
        return $result;}
		
		
	public function	SubList()
	{
	$result=$this->AdminQueriesObj->SubList();
	
        return $result;	
	}
	public function Add_New_Drug($ProductName,$prescription,$deprecated_drugs,$price,$target_path,$Desc,$Category, $Sub, $Ingredients,$Company,$Form,$tags)
	{
		$result=$this->AdminQueriesObj->Add_New_Drug($ProductName,$prescription,$deprecated_drugs,$price,$target_path,$Desc,$Category, $Sub, $Ingredients,$Company,$Form,$tags);
	 return $result;	
	}
}