<?php

require_once("maker.php");

/*

-----------------IMPORTANT---------------------

//Renders the HTML for a Model
	 !!!!!!! IT REQUIRES a MODEL OBJECT AND a MAKE OBJECT !!!!!!!
	(respectively "model.php" and "maker.php" files) to be passed in for rendering.

Methods of the ModelView class:

** render ** : render the HTML about a selected model

*/


class ModelView{

	public function render($oModel,$oMake){

		$sHTML ="";

		$sHTML .= '<div class="shell">
				   <div id="pageContent"><h1>'.$oMake-> MakeName.'</h1>
				   <h2>'.$oModel-> ModelName.'</h2>
				   <h3>$'.$oModel-> Price.'</h3><a href="">Add To Cart</a>
				   <p>'.$oModel-> Description.'</p>
				   </div><!-- end of page content -->
				   <div id="pageImage">
                    <img src="'.$oModel-> Photopath.'" height="300px" width="600px" alt="" />
	                </div>
	                <div id="pluscart"></div> <!-- PLACHOLDER --> 
	                <div id="clear"></div>
	                </div> <!-- end of shell -->';


	    return $sHTML;

	}


}

/*
$oModel= new Model();
$oMake= new Make();

$oModel-> load(19);
$oMake-> load(3);

$ModelView = new ModelView();
echo $ModelView-> render($oModel,$oMake);
*/

?>