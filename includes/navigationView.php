<?php

require_once("makeManager.php");

class NavigationView{
	

	public function render($aAllMakes){

		$sHTML ="";

		$sHTML .= '<ul>';


		for($i=0; $i<count($aAllMakes); $i++){

			$oCurrentMake = $aAllMakes[$i];
			$aModels = $oCurrentMake-> Models;

			$sHTML .= '<li><a href="#">' .$oCurrentMake-> MakeName. '</a></li>';
		}

		$sHTML .= '</ul>';

		return $sHTML;
	}



}

/*
$oMM = new MakeManager();


$aAllSubjects = $oMM-> getAllMakes();

$NV = new NavigationView();
echo $NV-> render($aAllSubjects);
*/
?>