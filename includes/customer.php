<?php

require_once("db.php");
require_once("form.php");

class Customer{

	private $iCustomerID;
	private $sFirstName;
	private $sLastName;
	private $iTelephone;
	private $sEmail;
	private $sUserName;
	private $sPassword;
	private $iCredit;

	public function __construct(){

		$this-> iCustomerID = 0;
		$this-> sFirstName = "";
		$this-> sLastName = "";
		$this-> iTelephone = 0;
		$this-> sEmail = "";
		$this-> sUserName = "";
		$this-> sPassword = "";
		$this-> iCredit = 0;

	}

	public function save(){

		$oDatabase = new Database_Connection();

		$sQuery = "
				INSERT INTO tbcustomer (FirstName, LastName, Telephone, Email, Username, Password)
				VALUES (
						'".$this-> sFirstName."',
						'".$this-> sLastName."',
						'".$this-> iTelephone."',
						'".$this-> sEmail."',
						'".$this-> sUserName."',
						'".$this-> sPassword."'
						)";
		
		$oResult = $oDatabase-> query($sQuery);

		$this->iCustomerID = $oDatabase->get_insert_id(); //when registering it logs in automatically w/ session in register.php

		$oDatabase-> close_connection();


	}
	//precon: ID to load must exist
	public function load($iCustomerID){

		$oDatabase = new Database_Connection();

		$sQuery = " 
				SELECT CustomerID, FirstName, LastName, Telephone, Email, UserName, Password, Credit
				FROM tbcustomer
				WHERE CustomerID=" .$iCustomerID;

		$oResult = $oDatabase-> query($sQuery);
		$aCustomer = $oDatabase-> fetch_array($oResult);

		$this-> iCustomerID = $aCustomer["CustomerID"];
		$this-> sFirstName = $aCustomer["FirstName"];
		$this-> sLastName = $aCustomer["LastName"];
		$this-> iTelephone = $aCustomer["Telephone"];
		$this-> sEmail = $aCustomer["Email"];
		$this-> sUserName = $aCustomer["UserName"];
		$this-> sPassword = $aCustomer["Password"];
		$this-> iCredit = $aCustomer["Credit"];


		$oDatabase-> close_connection();

	}


	//username does not have to exist
	public function loadByUserName($sUserName){

		$oDatabase = new Database_Connection();

		$sQuery = "
				SELECT CustomerID
				FROM tbcustomer
				WHERE UserName= '".$sUserName."'";
				
				

		$oResult = $oDatabase-> query($sQuery);
		$aCustomerInfo = $oDatabase-> fetch_array($oResult);
		$oDatabase-> close_connection();
		

		if($aCustomerInfo != false){
			$this->load($aCustomerInfo["CustomerID"]);
			
			return true;

		}else{

			return false;
		}

		
	}





	public function __get($_Property){

		switch ($_Property){
			case "CustomerID":
				return $this-> iCustomerID;
				break;
			case "FirstName":
				return $this-> sFirstName;
				break;
			case "LastName":
				return $this-> sLastName;
				break;
			case "Telephone":
				return $this-> iTelephone;
				break;
			case "Email":
				return $this-> sEmail;
				break;
			case "UserName": 
				return $this-> sUserName;
				break;
			case "Password":
				return $this-> sPassword;
				break;
			case "Credit":
				return $this-> iCredit;
				break;
			default:
				die($_Property ." is not allowed to read from");
		}


	}

	public function __set($_Property, $_Value){

		switch ($_Property){
			case "FirstName":
				$this-> sFirstName = $_Value;
				break;
			case "LastName":
				$this-> sLastName = $_Value;
				break;
			case "Telephone":
				$this-> iTelephone = $_Value;
				break;
			case "Email":
				$this-> sEmail = $_Value;
				break;
			case "UserName":
				$this-> sUserName = $_Value;
				break;
			case "Password":
				$this-> sPassword = $_Value;
				break;
			default:
				die($_Property. " is not allowed to write to (issue in customer setter");


		}
	}


}



/*
$oCustomer = new Customer();
$oCustomer-> loadByUserName("bobby");


echo "<pre>";
print_r($oCustomer);
echo "</pre>";
*/


/*

$oNewMember = new Customer();
$oNewMember-> FirstName = "Andy";
$oNewMember-> LastName = "Pandy";
$oNewMember-> Telephone = 0210461869;
$oNewMember-> Email = "andy.pandy@gmail.com";
$oNewMember-> Username = "andyPandy";
$oNewMember-> Password = "boom";

$oNewMember-> save();

echo "<pre>";
print_r($oNewMember);
echo "</pre>";
 
*/



?>