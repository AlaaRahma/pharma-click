<?php

/**
 * Description of Address
 *
 * @author Alaa
 */
include_once '../Database/AddressQueries.php';
class Address {
    private $AddressQueriesObj;
     
    
    public function __construct() {
        $this->AddressQueriesObj=new AddressQueries();
    }
    public function Cities (){
        $AllCities=$this->AddressQueriesObj->GetAllCities();
        return $AllCities;
    }
    public function Zones (){
        $AllZones= $this->AddressQueriesObj->GetAllZones();
        return $AllZones;
    }
    public function GetPatientAddress ($patientId){
        $Address=$this->AddressQueriesObj->GetPatientAddress($patientId);
        return $Address;
    }
}
