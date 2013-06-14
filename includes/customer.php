<?php

require_once("db.php");

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

		$oDatabase-> close_connection();


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