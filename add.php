<?php

require_once("includes/cart.php");
session_start();

if(!isset($_SESSION["CurrentID"])){
	header("location:login.php");
	exit;
} else{

$oCart= $_SESSION["cart"];

$iModelID = $_GET["ModelID"];

$oCart-> add($iModelID, 1);

header("location:mycart.php");
exit;

}

?>