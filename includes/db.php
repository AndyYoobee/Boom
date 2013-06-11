<?php
define("HOST", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "");
define("DB_NAME", "shoppingforcars");

//This class represents the database connection to mysql db

/*

-----------------IMPORTANT---------------------
Methods of the Database Connection:

When you call the Database_Connection it automatically connects to the DB

** close_connection ** : This close the Connection with the DB

** query ** : Excute query and return the result set. This result set is meant to be passed in to the fetch_array method

** fetch_array ** : The result set passed in must be returned from the query() method

*/
class Database_Connection{
    
    private $sqliConnection;
    
    public function __construct(){
        
        //establish connection to database using db-specific driver
        $this->sqliConnection = new mysqli(HOST,USER_NAME, PASSWORD, DB_NAME);
    
        if($this->sqliConnection->connect_error){
        
           die("Connection error " . $this->sqliConnection->connect_error);
        
        }
        
    }
    public function close_connection(){
        
        $this->sqliConnection->close();  
        
    }

    //Excute query and return the result set
    //This result set is meant to be passed in to the fetch_array method
    public function query($sSQL){
         
        $resResult = $this->sqliConnection->query($sSQL);
        
        if(!$resResult){
        
            die("Query LAMENTABLY fails " . $sSQL);
        
        }
        
        return $resResult; 
    }
    
    //Precondition: the result set passed in must be returned from
    //the query() method
    public function fetch_array($resResult){
        
        return $resResult->fetch_array(MYSQLI_ASSOC);
        
    }  

}

?>