<?php 

require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");

$oForm = new Form();

if(isset($_POST["submit"])){
	//give form data
	$oForm->Data = $_POST;
	//call check method
	$oForm->checkEmpty("firstname");
	$oForm->checkEmpty("lastname");
	$oForm->checkEmpty("telephone");
	$oForm->checkEmpty("email");
	$oForm->checkEmpty("username");
	$oForm->checkEmpty("password");
	
	$oTestCustomer = new Customer();

	$bLoadResult = $oTestCustomer->loadByUserName($_POST["username"]);
	if ($bLoadResult == true){
		$oForm->raiseCustomError("username","Username has already been taken"); 
	}




	if($oForm->Validation == true){
		$oCustomer = new Customer();
		$oCustomer->FirstName = $_POST["firstname"];
		$oCustomer->LastName = $_POST["lastname"];
		$oCustomer->Telephone = $_POST["telephone"];
		$oCustomer->Email = $_POST["email"];
		$oCustomer->UserName = $_POST["username"];
		$oCustomer->Password = $_POST["password"];
		$oCustomer->save();

		header("location:index.php");
		exit;
	}



}


$oForm-> makeInput("text","firstname", "First Name");
$oForm-> makeInput("text","lastname", "Last Name");
$oForm-> makeInputTelephone("telephone", "Phone Number");
$oForm-> makeInputEmail("email", "Email");
$oForm-> makeInput("text","username", "User Name");
$oForm-> makeInput("password","password", "Password");
$oForm-> makeSubmit("submit", "Register");

echo $oForm->HTML;

// $oForm->HTML;




require_once("includes/footer.php");



 ?>