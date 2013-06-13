<?php 

  require_once("navigationView.php");
  require_once("makeManager.php");

  $oNV = new NavigationView();
  $oMM = new MakeManager();

  $oAllMakes = $oMM->getAllMakes();

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Shopping cart</title>
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
    </head>
    <body>
      <div id="container">
            <div id="login">
                <ul>
                <li class="login"><a href="">Login</a>
                <li class="login"><a href="">Register</a>
                </ul>

            </div>
            <div id="logo"><a href="">Logo</a></div>
            <div id="navigation">
                
                <?php echo $oNV->render($oAllMakes); ?>
            
                </div> <!-- end of navigation -->

            
            <div id="main">