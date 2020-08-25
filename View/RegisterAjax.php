
<?php 
session_start();
 include_once '../BusinessLogic/User.php';
 include_once '../BusinessLogic/Admin.php';
 
 if (isset($_POST['type']) && $_POST['type']=='patient') {
        if(isset($_POST['firstName'])&&!empty($_POST['firstName'])){
            $firstName=$_POST['firstName'];
        }
         if(isset($_POST['lastName'])&&!empty($_POST['lastName'])){
            $lastName= $_POST['lastName'];
        }
        if(isset($_POST['email']))
        {
            $email=  $_POST['email'];
        } 
        if(isset($_POST['password'])&&!empty($_POST['password'])) {
           $password=   $_POST['password'];
        } 
        $new_user= new User();
        $result= $new_user->Register($firstName, $lastName, $email, $password);
        
        if($result){
            ob_clean();
            echo '1';
        }
        else{
            ob_clean();
            echo '0';  
        }  
 }
        
 if (isset($_POST['type']) && $_POST['type']=='pharmacy') {
     if(!empty($_POST['pharmName'])) 
         $pharmName=$_POST['pharmName'];
     if (!empty($_POST['commercial_reg']))
         $commercial_reg=$_POST['commercial_reg'];
      if (!empty($_POST['license']))
         $license=$_POST['license'];
       if (!empty($_POST['pharm_email']))
         $email_ph=$_POST['pharm_email'];
        if (!empty($_POST['pharm_password']))
         $password_ph=$_POST['pharm_password'];
        if (!empty($_POST['phone_ph']))
         $phone_ph=$_POST['phone_ph'];
        $new_user= new User();
        $pharmRequest=$new_user->RegisterPharmacy($commercial_reg, $license, $pharmName, $email_ph, $password_ph,$phone_ph);
        if($pharmRequest){
            ob_clean();
            echo '1';
        }
        else{
            //ob_clean();
            echo '0';  
        }
 }
?>
