
<?php 
include_once '../BusinessLogic/User.php';
session_start();
if (isset($_SESSION['id']))
{
    $user=new User();
    $logoutAction=$user->logout();
    header("location: index.php");
}

?>