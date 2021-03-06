<?php
define("HOST", "localhost");
define("USER_NAME", "root"); //remote database admin username  root "dennisbe_tester"
define("PASSWORD", ""); //remote database admin password. "tester1"
define("DB_NAME", "shoppingforcars"); //change depending on the remote database name shoppingforcars "dennisbe_test"

//This class represents the database connection to mysql db

/*

-----------------IMPORTANT---------------------
Methods of the Database Connection:

When you call the Database_Connection it automatically connects to the DB

** close_connection ** : This close the Connection with the DB

** query ** : Execute query and return the result set. This result set is meant to be passed in to the fetch_array method

** fetch_array ** : The result set passed in must be returned from the query() method

*/
class Database_Connection{
    
    private $sqliConnection;
    
    public function __construct(){
        
        //establish connection to database using db-specific driver
        $this->sqliConnection = new mysqli(HOST,USER_NAME,PASSWORD, DB_NAME);
    
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

    //this method returns the last auto-increment number
    public function get_insert_id(){

        return $this->sqliConnection->insert_id;

    }     



    //method for filtering input and output
    public function escape_value($value){

        $magic_quotes_active = get_magic_quotes_gpc();
        $new_enough_php = function_exists( "mysqli_real_escape_string" ); // i.e. PHP >= v4.3.0

        if( $new_enough_php ) { // PHP v4.3.0 or higher
            // undo any magic quote effects so mysql_real_escape_string can do the work
            if( $magic_quotes_active ) { 
                $value = stripslashes( $value ); 
            }
            $value = $this->sqliConnection->real_escape_string( $value );
        }else{ // before PHP v4.3.0
            // if magic quotes aren't already on then add slashes manually
            if( !$magic_quotes_active ) { 
                $value = addslashes( $value ); 
            }
            // if magic quotes are active, then the slashes already exist
        }
        return $value;
    }

}
?>