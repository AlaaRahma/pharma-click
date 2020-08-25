<?php



/**
 * Description of pharmacy
 *
 *
 */
include_once 'User.php';
include_once '../Database/pharmacyQueries.php';
class Pharmacy_Admin extends User {
    private $licence; 
    private $commercial_reg; 
    private $visit_counter;   
    private $pharmacyQueriesObj; 

    public function __construct() {
        $this->pharmacyQueriesObj=new pharmacyQueries();
    }
    
    public function Add_Pharmacy_Drug($drgId, $pharmacyId, $quantity){
		 $adddurg= $this->pharmacyQueriesObj->AddPharmacyDrug($drgId, $pharmacyId, $quantity);
       return $adddurg;
        
    }
    public function Update_drug (){
        
    } 
    public function GetDrugQuantity ($drgId,$pharmacyId){
       $quantity= $this->pharmacyQueriesObj->GetDrugQuantity($drgId, $pharmacyId);
       return $quantity;
    }
   
    public function Generate_reports (){
        
    }
	public function CatList()
	{	 $result= $this->pharmacyQueriesObj->CategoryList();
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
	}
	
	
		public function SubCatg($catid)
	{	 $result= $this->pharmacyQueriesObj->Sub_Catg($catid);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
	}
	
	public function PharmacyProducts($id)
	{
	
	
		 $result= $this->pharmacyQueriesObj->GetPharmacyProducts($id);

				//echo $result;
					return   $result;
	}
	
		
		public function Cat_Pharmacy_Products($id , $cat_id)
		{
			$result= $this->pharmacyQueriesObj->GetPharmacy_Products_Cat($id , $cat_id);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
			public function Get_Offers_type()
		{
			$result= $this->pharmacyQueriesObj->OfferType();
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
		public function Add_Pharmacy_Offer($DrgID,$pharmacyID,$Quantity,$price,$timefrom,$timeto,$dsc,$offer)
		{
			$result= $this->pharmacyQueriesObj->Pharmacy_Offer_to_Add($DrgID,$pharmacyID,$Quantity,$price,$timefrom,$timeto,$dsc,$offer);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
		
			public function Get_Form_type()
		{
			$result= $this->pharmacyQueriesObj->FormType();
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
			public function Get_CompanyNames()
		{
			$result= $this->pharmacyQueriesObj->CompanyNames();
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
			public function Get_ActiveIng()
		{
			$result= $this->pharmacyQueriesObj->ActiveIng();
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
		public function View_Pharmacy_Offers($id)
		{
				$result= $this->pharmacyQueriesObj->PharmacyOffers($id);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
			public function PharmacyList()
	{	 $result= $this->pharmacyQueriesObj->PharmacyList();
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
	}
	public function Pharmacy_product_list($id)
	{
	$result= $this->pharmacyQueriesObj->Get_Product_List($id);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;	
	}
	public function PharmacyOffers($id)
	{
		$result= $this->pharmacyQueriesObj->Get_Pharmacy_Offer_List($id);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;	
	}
		public function PharmacyName($id)
	{
	
	
		 $result= $this->pharmacyQueriesObj->PharmacyNames($id);

				//echo $result;
					return   $result;
	}
	public function PharmaSub_Products ($subid, $pharmaid)
	{
		
		 $result= $this->pharmacyQueriesObj->PharmacySub($subid, $pharmaid);

				//echo $result;
					return   $result;
	}
	public function Add_Pharmacy_Branch($BranchName,$pharmacyID,$City,$Zone,$Address,$Phone,$GoogleURL)
	{
			
		 $result= $this->pharmacyQueriesObj->PharmacyBranch($BranchName,$pharmacyID,$City,$Zone,$Address,$Phone,$GoogleURL);
	
			//	echo $result;
					return   $result;
	}
	public function PharmacyBranches($id)
	{
		$result= $this->pharmacyQueriesObj->Get_PharmacyBranches($id);
	
				//echo $result;
					return   $result;
	}
	public function DeleteBranch($branch_id)
	{
			$result= $this->pharmacyQueriesObj->Delete_PharmacyBranch($branch_id);
	
				//echo $result;
					return   $result;
	}
	public function DeleteOffer($offer_id)
	{
		$result= $this->pharmacyQueriesObj->Delete_Pharmacyoffer($offer_id);
	
				//echo $result;
					return   $result;
	}
	public function DeleteDrug($drug_id,$pharma_id)
	{
		$result= $this->pharmacyQueriesObj->Delete_Pharmacyproduct($drug_id,$pharma_id);
	
				//echo $result;
					return   $result;
	}
	public function PharmacyOrders($id) 
	{
		$result= $this->pharmacyQueriesObj->Pharmacyorder($id);
	
				//echo $result;
					return   $result;
	}
	 public function OrderPharmaDetails($orderId,$patientId){
        $result=$this->pharmacyQueriesObj->OrderPharma($orderId ,$patientId);
		
        return $result;
    }
	   public function OrderPharma($orderId,$pharmacyId,$patientId){
        $Drugs=$this->pharmacyQueriesObj->OrderPharmaDrugs($orderId,$pharmacyId, $patientId);
        return $Drugs;
    }
	public function OrderCounts($orderId )
	{
        $Drugs=$this->pharmacyQueriesObj->GetOrder_Pharma_Count($orderId);
        return $Drugs;
    }
	public function UpdatePharmOrderStatus($orderId, $patientId ,$status)
	{
		  $Drugs=$this->pharmacyQueriesObj->updatepharmaorderstatus($orderId, $patientId ,$status);
        return $Drugs;
	}
	
	public function getofferdata($offerid)
	{
		  $Drugs=$this->pharmacyQueriesObj->getofferdata($offerid);
        return $Drugs;
	}
	public function editoffer ($Quantity,$price,$timefrom,$timeto,$dsc,$offerID)
	{
		$Drugs=$this->pharmacyQueriesObj->editoffer($Quantity,$price,$timefrom,$timeto,$dsc,$offerID);
        return $Drugs;
	}
		public function getProductData ($DrugID)
	{
		$Drugs=$this->pharmacyQueriesObj->getProductData ($DrugID);
        return $Drugs;
	}
		public function editdrug ($Quantity,$DrugID)
	{
		$Drugs=$this->pharmacyQueriesObj->editdrug ($Quantity,$DrugID);
        return $Drugs;
	}
        public function getpharmacyProductsDetails($drug_id,$id)
	{
	$Drugs=$this->pharmacyQueriesObj->	getpharmacyProductsDetails($drug_id,$id);
	return $Drugs;	
	}
        public function editproductpharmacy($Quantity,$product_id,$id)
	{
		$Drugs=$this->pharmacyQueriesObj->	editproductpharmacy($Quantity,$product_id,$id);
			return $Drugs;	
	}
	
	}
	
