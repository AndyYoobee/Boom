<?php 
session_start();
unset($_SESSION["CurrentID"]);

header("location:index.php");
exit;


?>