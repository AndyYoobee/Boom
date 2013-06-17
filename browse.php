<?php 
require_once("includes/head.php");
require_once("includes/makeView.php");
require_once("includes/make.php");

$oMV = new makeView();

$iMakeID = 1; //default load page

if(isset($_GET["MakeID"])){
    $iMakeID = $_GET["MakeID"];
}

$oCurrentMake = new Make();
$oCurrentMake->load($iMakeID);

echo $oMV->render($oCurrentMake);


require_once("includes/footer.php");

 ?>