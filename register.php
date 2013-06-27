<?php 

require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");
require_once("includes/class.phpmailer.php");
require_once("includes/encoder.php");

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
		$oCustomer->Password = Encoder::encode($_POST["password"]);
		$oCustomer->save();

		//Create a new PHPMailer instance
		$mail = new PHPMailer();
		//Set who the message is to be sent from
		$mail->SetFrom('admin@gt.com', 'GT Cars');
		//Set an alternative reply-to address
		$mail->AddReplyTo('replyto@example.com','First Last');
		//Set who the message is to be sent to
		$mail->AddAddress($_POST["email"], $_POST["firstname"]. $_POST["lastname"]);
		//Set the subject line
		$mail->Subject = 'Thank you for registering';
		// //Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
		$mail->MsgHTML('Hi');
		//Replace the plain text body with one created manually
		$mail->AltBody = 'Thank you for registering at GT cars.';


		//Send the message, check for errors
		if(!$mail->Send()) {
		  die("Mailer Error: " . $mail->ErrorInfo);
		} 

		$_SESSION["CurrentID"]=$oCustomer->CustomerID;//uncomment this to auto log in once registered.
		$_SESSION["cart"] = new Cart();
		header("location:customerdetails.php"); //if not using ^, then change the location.
		exit;
	}



}

echo '<div id="title">Register</div>';
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