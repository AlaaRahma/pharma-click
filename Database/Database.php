<?php



/**
 * Description of Database
 *
 * @author Alaa
 */
class Database { 
    private $host ="localhost";
    private $DatabaseName= "med_portal";

 
    private $userName ="root"; 
    private $password="";
    private $connection;
    
    
    public function __construct() {
        $this->connection=$this->dbConnect();
        if(!$this->connection){
            die("Database Connection Error".mysqli_connect_errno());
			
        }
        
    }
    private function dbConnect(){
        $connnection=mysqli_connect($this->host, $this->userName, $this->password, $this->DatabaseName);
        return $connnection;
        
    }
    public function executeQuery($query){
        
        $result=  mysqli_query($this->connection, $query);
        return $result;
    }
    public function executeMultipleQuery ($query){
        $result=  mysqli_multi_query($this->connection, $query);
        return $result;
    }
	 public function executeQueryRownumber($query){
             $result=  mysqli_query($this->connection, $query);
		 $no_of_rows = mysqli_num_rows($result);
		 return $no_of_rows;
        
    }
	 
			    public function executeQueryArray1($query){
        $return_arr=array();
				$result=  mysqli_query($this->connection, $query);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				return $row;
				}
    public function dbDisconnect(){
        mysqli_close($this->connection) or die("Database Error ".  mysqli_connect_errno());
    }
    public function getDataAssocArray($result){
        
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }

	//	echo $data[];
        return $data;
    }


    public function getConnection(){
        return $this->connection;
    }
    public function GetLastInsertedId(){
       
         $last_id = mysqli_insert_id($this->connection);
         return $last_id;
    }
  
}



