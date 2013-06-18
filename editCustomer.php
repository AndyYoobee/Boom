<?php 
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/Customer.php");

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