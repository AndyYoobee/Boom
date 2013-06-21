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
		$sHTML .= '<div id="title">'.$oMake-> MakeName.'</div>';
		for($i=0;$i<count($aModels);$i++){
			$oModel = $aModels[$i];

			$sHTML .= '<div class="shell">

                       <div class="pageImage">
                       <img src="'.$oModel-> Photopath.'" height="230px" width="470px" alt="" />
                       </div> <!--end of PageImage-->

                       <div class="pageContent">
                       <h2>'.$oModel-> ModelName.'</h2>
                       
                       <h3>$'.number_format($oModel-> Price,2).'</h3>
                       <p>'.$oModel-> Description.'</p>
                       </div><!-- end of page content -->

                       <a href="add.php?ModelID='.$oModel-> ModelID.'">Add To Cart</a>
                       
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