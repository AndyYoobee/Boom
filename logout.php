<?php 
session_start();
unset($_SESSION["CurrentID"]);
unset($_SESSION["cart"]);

header("location:index.php");
exit;


?>