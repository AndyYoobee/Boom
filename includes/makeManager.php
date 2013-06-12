<?php

require_once("make.php");



/*

-----------------IMPORTANT---------------------
Methods of the MakeManager class:


** getAllMakes ** : Load everything about all makes. Each Model of each Make. Contains all data in the tbmodel table


*/

class MakeManager{

	public function getAllMakes(){

		$oDatabase = new Database_Connection();

		$sQuery = "
				SELECT MakeID
				FROM tbmake";

		$oResult = $oDatabase-> query($sQuery);

		$aAllMakes = array();

		while($aRow = $oDatabase-> fetch_array($oResult)){

			$oMake = new Make();
			$oMake-> load($aRow["MakeID"]);
			$aAllMakes[] = $oMake;
		}

		$oDatabase-> close_connection();

		return $aAllMakes;

	}
}


//TEST - Passed

// $oMM = new MakeManager();
// $aAllSubjects = $oMM-> getAllMakes();

// echo "<pre>";
// print_r($aAllSubjects);
// echo "</pre>";

?>