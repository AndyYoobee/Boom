<?php

require_once("includes/head.php");
require_once("includes/model.php");
require_once("includes/cartView.php");

if(!isset($_SESSION["CurrentID"])){
	header("location:login.php");
	exit;
}

$oCurrentCart = $_SESSION["cart"];
$oCartView = new CartView();

echo $oCartView-> render($oCurrentCart);







require_once("includes/footer.php");
?>