<!DOCTYPE html>
<html lang="en">
    <!-- header -->
    <?php

    include 'header.php';
    include_once '../BusinessLogic/User.php';
    $user= new User();
    $email="";
    if (isset($_SESSION['id'])){
        $email=$_SESSION['email'];
    }
    else {
        $email=$_POST['c_email'];
    }
    $subject=$_POST['c_subject'];
    $message=$_POST['c_message'];
    $usertype=0;
    $userId=0;
    if(!isset($_SESSION['id'])){
        $usertype=4;
        $userId=0;
    }
    else if(isset ($_SESSION['id'])&&$_SESSION['user_type']==2)
    {
        $usertype=2;
        $userId=$_SESSION['id'];
    }
    else if (isset ($_SESSION['id'])&&$_SESSION['user_type']==3){
        $usertype=3;
        $userId=$_SESSION['id'];
    }
    $message=$user->contactUs($userId,$usertype, $message);
  ?>
    <body>
        <div class="container">
            <div class=" alert alert-success" >
                Your Message Has Been Sent Successfully!
        </div>
        </div>
    </body>
    <!-- footer -->
<?php
include 'footer.php';
?> 
</html>

