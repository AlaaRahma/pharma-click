<?php
session_start();
include_once '../BusinessLogic/User.php';


if(isset($_POST['email'])&& isset($_POST['password'])){
    
    $username=$_POST['email'];
    $password=$_POST['password'];
    $user= new User();
    $data= $user->login($username, $password);
    
    if(count($data)==1){
       $_SESSION['id']= $data[0]["User_id"];
       $_SESSION['user_type']=$data[0][User_type];
      $_SESSION['name']=$data[0]["First_name"];
      $_SESSION['lastName']=$data[0]["Last_name"];
      $_SESSION['email']=$data[0]['Email'];
      $_SESSION['password']=$data[0]['Password'];
      $_SESSION['city_id']=$data[0]['city_id'];
      $_SESSION['zone_id']=$data[0]['zone_id'];
      $_SESSION['phone_num']=$data[0][phone_num];
      $_SESSION['nationality']=$data[0]['nationality'];
      $_SESSION['address']=$data[0]['address'];
    if($_SESSION['user_type']==2){
    $pharmacy=$user->ViewPharmacyDetails($_SESSION['id']);
    $_SESSION['commercial_reg']=$pharmacy['0']['commercial_reg'];
    $_SESSION['licence']=$pharmacy['0']['licence'];
   
   
    
   }
         ob_clean();    
       echo $_SESSION['user_type'];
    }
 else {
        ob_clean();
       echo '0';  
    }
    
}

?>