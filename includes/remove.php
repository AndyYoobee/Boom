<?php

session_start();


$oCurrentCart-> add(16, 1);

header("location:mycart.php");
exit;



?>