<?php



/**
 * Description of User
 *
 * @author Alaa
 */
include_once '../Database/UserQueries.php';
class User {
    
   public $state="Egypt";
   
   private $userQueriesObj;
   
   public function __construct() {
       $this->userQueriesObj=new UserQueries();
       
   }
   
   public function login($username,$password){
      $userData= $this->userQueriesObj->loginQuery($username, $password);
      return $userData;
   }
   public function Register($firstName,$lastName,$email,$password){
        $result=  $this->userQueriesObj->RegisterQuery($firstName, $lastName, $email, $password);
        if($result){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function Edit_profile ($id,$firstName,$lastName,$password,$nationality,$city,$zone,$address,$phone_num){
        $result=  $this->userQueriesObj->EditProfileQuery($id,$firstName, $lastName, $password, $nationality, $city, $zone,$address, $phone_num);
        return $result; 
    }
    
    public function logout (){
        $this->userQueriesObj->logoutQuery();
                             }
     public function ViewPharmacyDetails ($pharmacyId){
       $pharmacyDetails=$this->userQueriesObj->ViewPharmacyDetails($pharmacyId);
       return $pharmacyDetails;
    }
    
	public function UserInfo($id)
	{
		      $userInfo= $this->userQueriesObj->UserInfo($id);
      return $userInfo;
	}
       
         public function RegisterPharmacy ($commercial_reg, $license, $Name, $Email, $password,$phone){
        $pharmRequest=$this->userQueriesObj->RegisterPharmacy($commercial_reg, $license, $Name, $Email, $password,$phone);
        return $pharmRequest;   
    }
    public function General_search ($searchItem){
        $search_result=$this->userQueriesObj->General_search($searchItem);
        return $search_result;
    }
    
    public function searchBylocation ($location){
        $search_result=$this->userQueriesObj->searchLocation($location);
                return $search_result;
    }
    public function contactUs ($userId,$usertype,$email,$subject,$message){
        $contact=$this->userQueriesObj->contactUs($usertype,$email,$subject, $message);
        return $contact;
    } 
    
    
    public function ViewPharmDetails($pharmacyId) {
        $data=$this->userQueriesObj->ViewPharmacyDetails($pharmacyId);
        return $data;
    }
    

}





