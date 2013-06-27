<?php 
  ob_start();
  require_once("navigationview.php");
  require_once("cart.php");
  require_once("customer.php");
  require_once("makemanager.php"); 
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

                   $oUser = new Customer();
                   $oUser-> load($_SESSION["CurrentID"]);
                    if($oUser-> Admin != 0){
                      echo '<li class="login"><a href="mycart.php">My Cart</a>';
                      echo '<li class="login"><a href="addmodel.php">Admin</a>';
                      echo '<li class="login"><a href="logout.php">Log Out</a>';

                    }else{

                    echo '<li class="login"><a href="mycart.php">My Cart</a>';
                    echo '<li class="login"><a href="customerdetails.php">My Details</a>';
                    echo '<li class="login"><a href="logout.php">Log Out</a>';
                    }

                  }else{
               

                        echo '<li class="login"><a href="login.php">Login</a>
                        <li class="login"><a href="register.php">Register</a>';               
                  
                  }
                  ?>
                </ul>

            </div>
            <div id="logo"><a href="index.php"><img src="assets/img/logo2.png" width="200px" height="150px" /></a></div>
            <div id="navigation">
                
                <?php echo $oNV->render($oAllMakes); ?>
            
                </div> <!-- end of navigation -->
          
            
            <div id="main">