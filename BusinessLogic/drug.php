<?php



/**
 * Description of Drugs
 *
 * @author Omnia
 */
include_once '../Database/DrugQueries.php';
include_once 'User.php';
class drug  {
	public $drug_id; 
    public $drug_name; 
    public $commercial_reg; 
    public $prescription ;   
    public $deprecated_drugs;  
	public $Desc; 
    public $price ; 
    public $drug_type ;   
    public $drug_cat;
	public $drug_active_ingred; 
    public $drug_image ;  
    private $drugQueriesObj;
   public function  __construct(){
       $this->drugQueriesObj=new DrugQueries();
   }    public function View_drug(){
		
        $result= $this->drugQueriesObj->ViewProductListHome();
					return   $result;

				
    }
	  public function View_drug_info($drug_id,$phramid){
		
        $result= $this->drugQueriesObj->ViewProductDetails($drug_id,$phramid);

	 return   $result;

 
    }
	public function All_Drug_List()
	{
	 $result= $this->drugQueriesObj->All_Drug_List();
	//ar_dump ( $result);
	// $response = json_encode($result,JSON_UNESCAPED_UNICODE); 
	 return   $result;	
	}
	public function Cat_Products($cat_id)
		{
			$result= $this->drugQueriesObj->Get_Products_Cat($cat_id);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
		public function Products_tags()
		{
			$result= $this->drugQueriesObj->Get_Products_tags();
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
			
		}
		public function View_Offers()
		{
					$result= $this->drugQueriesObj->Get_Offers();
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
		public function Cat_Name($cat_id)
		{
			$result= $this->drugQueriesObj->Get_Cat_Name($cat_id);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
		public function Sub_Name($sub_id)
			{
			$result= $this->drugQueriesObj->Get_Sub_Name($sub_id);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
		}
		public function  Sub_Products($sub_id)
		{
			$result= $this->drugQueriesObj->Get_Sub_Products($sub_id);
		// $response = json_encode($result,JSON_UNESCAPED_UNICODE); ;
			//  	echo json_encode($result,JSON_UNESCAPED_UNICODE);
				
					return   $result;
			
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