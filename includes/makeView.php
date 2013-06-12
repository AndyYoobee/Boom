<?php



/*

-----------------IMPORTANT---------------------

//Renders the HTML for a Make
	 !!!!!!! IT REQUIRES a MAKE OBJECT AND a THE MODEL ARRAY !!!!!!!
	

Methods of the MakeView class:

** render ** : render the HTML about all the models of a selected make

*/


class MakeView{

	public function render($oMake){
		$aModels= $oMake->Models;
		

		$sHTML ="";
		
		for($i=0;$i<count($aModels);$i++){
			$oModel = $aModels[$i];

			$sHTML .= '<div class="shell">
					   <div class="pageContent"><h1>'.$oMake-> MakeName.'</h1>
					   <h2>'.$oModel-> ModelName.'</h2>
					   <h3>$'.number_format($oModel-> Price,2).'</h3><a href="">Add To Cart</a>
					   <p>'.$oModel-> Description.'</p>
					   </div><!-- end of page content -->
					   <div class="pageImage">
	                   <img src="'.$oModel-> Photopath.'" height="300px" width="600px" alt="" />
		               </div>
		               <div class="clear"></div>
		               </div> <!-- end of shell -->';
		}

	    return $sHTML;

	}


}


// $oModel= new Model();
// $oMake= new Make();

// $oModel-> load(19);
// $oMake-> load(3);

// $ModelView = new ModelView();
// echo $ModelView-> render($oModel,$oMake);


?>