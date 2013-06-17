<?php

require_once("makeManager.php");

class NavigationView{
	

	public function render($aAllMakes){

		$sHTML ="";

		$sHTML .= '<ul>';

		$sHTML .= '<li class="nav"><a href="index.php">Home</a>
                </li>';

		for($i=0; $i<count($aAllMakes); $i++){

			$oCurrentMake = $aAllMakes[$i];
			$aModels = $oCurrentMake-> Models;

			$sHTML .= '<li class="nav"><a href="browse.php?MakeID='.$oCurrentMake->MakeID.'">' .$oCurrentMake-> MakeName. '</a></li>';
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