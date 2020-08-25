<?php
include_once '../BusinessLogic/Address.php';
session_Start (); 
$Address= new Address(); 
$cities= $Address->Cities(); 
$zones=$Address->Zones();
?> 
