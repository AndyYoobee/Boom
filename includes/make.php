<?php

require_once("model.php");


/*

-----------------IMPORTANT---------------------
Methods of the Make class:



** load ** : Load everything about a selected Make using it ID. It requires the MakeID in the ().

Properties from __get (Watch out for the Capital letters) : 
- MakeId
- MakelName
- Models

*/


class Make{

	private $iMakeID;
	private $sMakeName;
	private $aModels;
	

	public function __construct(){

		$this-> iMakeID = 0;
		$this-> sMakeName = "";
		$this-> aModels = array();

	}


	public function load($iMakeID){

		$oDatabase = new Database_Connection();

		$sQuery = "
				SELECT MakeID, MakeName
				FROM tbmake
				WHERE MakeID=" .$iMakeID;

		$oResult = $oDatabase-> query($sQuery);

		$aMake = $oDatabase-> fetch_array($oResult);

		$this-> iMakeID = $aMake["MakeID"];
		$this-> sMakeName = $aMake["MakeName"];


		$sQuery = "
				SELECT ModelID
				FROM tbmodel
				WHERE MakeID=" .$iMakeID;

		$oResult = $oDatabase-> query($sQuery);

		while($aRow = $oDatabase-> fetch_array($oResult)){

			$oModel = new Model();
			$oModel-> load($aRow["ModelID"]);
			$this-> aModels[] = $oModel;
		}

		$oDatabase-> close_connection();


	}

	public function __get($sProperty){

		switch ($sProperty){

			case "MakeID":
				return $this-> iMakeID;
				break;
			case "MakeName":
				return $this-> sMakeName;
				break;
			case "Models":
				return $this-> aModels;
				break;
			default:
				die($sProperty ." can not be read from without the Magic Word. Sorry Darling");
		}
	}

}



// $oMake = new Make();
// $oMake->load(1);

// echo "<pre>";
// print_r($oMake->Models);
// echo "</pre>";

?>