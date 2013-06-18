<?php 
  
  require_once("navigationView.php");
  require_once("makeManager.php"); 
  // require_once("form.php");

  $oNV = new NavigationView();
  $oMM = new MakeManager();


  $oAllMakes = $oMM->getAllMakes();
  session_start();
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


                  <?php 
                  if(isset($_SESSION["CurrentID"])){
                    echo '<li class="login"><a href="CustomerDetails.php">My Details</a>';
                    echo '<li class="login"><a href="logout.php">Log Out</a>';
                  }else{
                    echo '<li class="login"><a href="login.php">Login</a>
                    <li class="login"><a href="register.php">Register</a>';                  
                  } 
                  ?>
                </ul>

            </div>
            <div id="logo"><a href="">Logo</a></div>
            <div id="navigation">
                
                <?php echo $oNV->render($oAllMakes); ?>
            
                </div> <!-- end of navigation -->
          
            
            <div id="main">