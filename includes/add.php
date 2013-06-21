<?php

require_once("cart.php");
session_start();

$oCart= $_SESSION["cart"];

$oCart-> add(16, 1);

header("location:mycart.php");
exit;



?>