<?php 

require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/model.php");

if(!isset($_SESSION["CurrentID"])){
	header('location:login.php');
    exit;
}else{

	$oUser = new Customer();
	$oUser-> load($_SESSION["CurrentID"]);
	if($oUser -> Admin !=1){
		header('location:login.php');
	exit;
	}
}



$oForm = new Form();

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";


if(isset($_POST["submit"])){
	//give form data
	$oForm->Data = $_POST;
	$oForm->Files = $_FILES;
	//call check method
	$oForm->checkEmpty("modelname");
	$oForm->checkEmpty("carprice");
	$oForm->checkEmpty("makeid");
	$oForm->checkEmpty("stock");
	// DONT FORGET to remove the check for the Photopath
	$oForm->checkEmpty("textarea");
	$oForm->checkImageUpload("Photopath");
	

	if($oForm->Validation == true){

		$sNewName="assets/img/".time().".jpg";
        $oForm->moveFile("Photopath",$sNewName);


		$oModel = new Model();
		$oModel->ModelName = $_POST["modelname"];
		$oModel->Price = $_POST["carprice"];
		$oModel->MakeID = $_POST["makeid"];
		$oModel->Stocklevel = $_POST["stock"];
		$oModel->Photopath = $sNewName;
		$oModel->Description = $_POST["textarea"];
		$oModel->save();

		header("location:browse.php?MakeID=".$_POST['makeid']); //if not using ^, then change the location.
		//change to admin home page.
		//exit;
	}
}


$aMake = array();
$aMake[0]= "Select Make";
$aMake[1]= "Aston Martin";
$aMake[2]= "Audi";
$aMake[3]= "Maserati";
$aMake[4]= "Mercedes";





$oForm-> makeInput("text","modelname","Model Name");
$oForm-> makeInput("text","carprice","Price");

$oForm-> makeSelect("makeid","Make ID",$aMake);
$oForm-> makeInput("text","stock","Stock");
$oForm-> makeUploadFile("Image","Photopath");
$oForm-> makeTextarea("textarea","Description");
$oForm-> makeSubmit("submit","Add Model");

echo $oForm-> HTML;


require_once("includes/footer.php");
//footer




 ?>