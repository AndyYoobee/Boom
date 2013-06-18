<?php 
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");




$oForm = new Form();

if(isset($_POST["submit"])){
	$oForm->Data = $_POST; //makes this sticky!!!!!!!!

	//create test customer
	$oTestUser = new Customer();
	//$oTestUser->UserName = $_POST["username"];
	//$oTestUser->Password = $_POST["password"];

	$bLoadResult = $oTestUser->loadByUsername($_POST["username"]);

	//load test customer by username
	if($bLoadResult == false){
		//raise error to username if load fails
		$oForm->raiseCustomError("username","Username doesn't exist");
	}else{//else, compare passwords
		//$oDatabase = new Database_Connection();


		if($oTestUser->Password != $_POST["password"]){
			$oForm->raiseCustomError("password","Password is incorrect");
		}else{

			$_SESSION["CurrentID"] = $oTestUser->CustomerID;

			header("location:CustomerDetails.php"); //change later to the members index page!!!
			exit;
		}
	}

	

		//raise error if passwords dont match
		//else, redirect to homepage
}

echo '<div id="title">Login</div>';
$oForm-> makeInput("text","username", "User Name");
$oForm-> makeInput("password","password", "Password");
$oForm-> makeSubmit("submit", "Login");

echo $oForm->HTML;

// $oForm->HTML;




require_once("includes/footer.php");


 ?>