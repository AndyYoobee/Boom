<?php 
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");

if(!isset($_SESSION["CurrentID"])){
	header("location:login.php");
	exit;
}

$oCustomer = new Customer();
$oCustomer->load($_SESSION["CurrentID"]);


$oForm = new Form();
$aData = array();
$aData["firstname"] = $oCustomer->FirstName;
$aData["lastname"] = $oCustomer->LastName;
$aData["telephone"] = $oCustomer->Telephone;
$aData["email"] = $oCustomer->Email;
$oForm->Data = $aData;


// When the submit button is hit.
if(isset($_POST["submit"])){
	$oForm->Data = $_POST;
//check to see if the data is not empty
	$oForm-> checkEmpty("firstname");
	$oForm-> checkEmpty("lastname");
	$oForm-> checkEmpty("telephone");
	$oForm-> checkEmpty("email");

//if the data is not empty and filled out
	if($oForm-> Validation == true){
//then update these forms to the new details.
		$oCustomer-> FirstName = $_POST["firstname"];
		$oCustomer-> LastName = $_POST["lastname"];
		$oCustomer-> Telephone = $_POST["telephone"];
		$oCustomer-> Email = $_POST["email"];
		$oCustomer-> save();//always update
//when done exit back to the customer's details.
		header("location:CustomerDetails.php");
		exit;
	}

}

//when the form is submitted

//validate the input, if all is corectthen 

//submit button will update to the DB



echo '<div id="title">Edit Details</div>';
$oForm-> makeInput("text","firstname", "First Name");
$oForm-> makeInput("text","lastname", "Last Name");
$oForm-> makeInputTelephone("telephone", "Phone Number");
$oForm-> makeInputEmail("email", "Email");
// $oForm-> makeInput("text","username", "User Name");
// $oForm-> makeInput("password","password", "Password");
$oForm-> makeSubmit("submit", "Apply");

echo $oForm->HTML;




require_once("includes/footer.php");

 ?>