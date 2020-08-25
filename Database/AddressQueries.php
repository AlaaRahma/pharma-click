<?php

/**
 * Description of AddressQueries
 *
 * @author Alaa
 */
include_once 'Database.php';
class AddressQueries {
    private $dbObject; 
  
    public function __construct() {
        $this->dbObject=new Database();
    }
    
    //Get All cities 
    public function GetAllCities () {
        $query="SELECT * FROM `city` ";
        $result= $this->dbObject->executeQuery($query);
        $Cities=$this->dbObject->getDataAssocArray($result);
        return $Cities;
    }
    
    
    // Get All zones 
    public function GetAllZones (){
        $query="SELECT * FROM `zone` ";
        $result= $this->dbObject->executeQuery($query);
        $Zones=$this->dbObject->getDataAssocArray($result);
        
      return $Zones;
    }
    
    // Add to user address
    public function GetPatientAddress ($patientId){
        $query="SELECT address,city.Name as City, zone.Name as Zone from user, zone, city WHERE "
                ." user.city_id=city.city_id and user.zone_id=zone.zone_id "
                . "and user.User_id=$patientId ";
        $result=$this->dbObject->executeQuery($query);
        $Address=$this->dbObject->getDataAssocArray($result);
        return $Address; 
    }
//    public function UpdateCity ($patientId){
//        $query="UPDATE `city` SET`Name`=$city WHERE $patientId";
//    }
//    public function UpdateZone ($patientId){
//        
//    }
//    public function  UpdateAddress ($patientId,$addressId){
//        
//    }
}
