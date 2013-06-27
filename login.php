<?php 
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");
require_once("includes/encoder.php");




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


		if($oTestUser->Password != Encoder::encode($_POST["password"])){
			$oForm->raiseCustomError("password","Password is incorrect");
		}else{

			$_SESSION["CurrentID"] = $oTestUser->CustomerID;

			$oCart = new Cart();
			// $oCart->add(14,4);
			// $oCart->add(13,2);
			$_SESSION["cart"]= $oCart;

			header("location:customerdetails.php"); //change later to the members index page!!!
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