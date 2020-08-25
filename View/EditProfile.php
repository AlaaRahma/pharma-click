<?php 
session_start();
include_once '../BusinessLogic/User.php';

if (isset($_SESSION['id'])) {
    $firstName=$_POST ['firstName'];
    $lastName=$_POST['lastName'];
    $password=$_POST['password'];
    $nationality=$_POST['nationality'];
    $city_id=$_POST['city'];
    $zone_id=$_POST['zone'];
    $phone_num=$_POST['phone_num'];
     $address=$_POST['address'];
    $user= new User();
    
    if($firstName=="" || $lastName=="" || $password=="" || $city_id=="" || $zone_id==""){
        $_SESSION['error']="incomplete";
        header("location: EditmyProfile.php");
    }
    else{
    $updated_data= $user->Edit_profile($_SESSION['id'],$firstName, $lastName, $password, $nationality, $city_id, $zone_id,$address, $phone_num);
    if($updated_data){
      $_SESSION['name']=$firstName;
      $_SESSION['lastName']=$lastName;
      $_SESSION['password']=$password;
      $_SESSION['city_id']=$city_id;
      $_SESSION['zone_id']=$zone_id;
      $_SESSION['phone_num']=$phone_num;
      $_SESSION['nationality']=$nationality;
      $_SESSION['address']=$address;
         $_SESSION['error']='success';
        header("location: EditmyProfile.php");
       
        }
   else{
       $_SESSION['error']='failure';
       header("location: EditmyProfile.php");
     }
   
    }
    
}





?>
