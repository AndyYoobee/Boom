<?php 
require_once("includes/head.php");
require_once("includes/customerview.php");
require_once("includes/customer.php");
if(!isset($_SESSION["CurrentID"])){
	header("location:login.php");
	exit;
}


$oCV = new CustomerView();

$iCurrentID = $_SESSION["CurrentID"];

$oCustomer = new Customer();
$oCustomer->load($iCurrentID);

echo $oCV->render($oCustomer);








// print_r($oCustomer);

// print_r($_SESSION[]);



require_once("includes/footer.php");
 ?>