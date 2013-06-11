<?php

require_once("db.php");


/*

-----------------IMPORTANT---------------------
Methods of the Model class:



** load ** : Load everything about a selected model using it ID. It requires the ModelID in the ().

Properties from __get (Watch out for the Capital letters) : 
- ModelId
- ModelName
- Description
- Price
- MakeID
- Stocklevel
- Photopath
- Active

*/


class Model{

	private $iModelID;
	private $sModelName;
	private $sDescription;
	private $iPrice;
	private $iMakeID;
	private $iStocklevel;
	private $sPhotopath;
	private $iActive;


	public function __construct(){

		$this-> iModelID = 0;
		$this-> sModelName = "";
		$this-> sDescription = "";
		$this-> iPrice = 0;
		$this-> iMakeID = 0;
		$this-> iStocklevel = 0;
		$this-> sPhotopath = "";
		$this-> iActive = 0;

	}

	public function load($iModelID){

	$oDatabase = new Database_Connection();

	$sQuery = "
				SELECT ModelID, ModelName, Description, Price, MakeID, Stocklevel, Photopath, Active
				FROM tbmodel
				WHERE ModelID=" .$iModelID;

	$oResult = $oDatabase-> query($sQuery);
	$aModel = $oDatabase-> fetch_array($oResult);



	$this-> iModelID = $aModel["ModelID"];
	$this-> sModelName = $aModel["ModelName"];
	$this-> sDescription = $aModel["Description"];
	$this-> iPrice = $aModel["Price"];
	$this-> iMakeID = $aModel["MakeID"];
	$this-> iStocklevel = $aModel["Stocklevel"];
	$this-> sPhotopath = $aModel["Photopath"];
	$this-> iActive = $aModel["Active"];

	$oDatabase-> close_connection();

	}


	public function __get($sProperty){

		switch ($sProperty){

			case "ModelId":
				return $this-> iModelID;
				break;
			case "ModelName":
				return $this-> sModelName;
				break;
			case "Description":
				return $this-> sDescription;
				break;
			case "Price":
				return $this-> iPrice;
				break;
			case "MakeID":
				return $this-> iMakeID;
				break;
			case "Stocklevel":
				return $this-> iStocklevel;
				break;
			case "Photopath":
				return $this-> sPhotopath;
				break;
			case "Active":
			 	return $this-> iActive;
			default:
			die($sProperty ." can not be read from without the Magic Word. Sorry Darling");
		}
	}
}


/*
$Test = new Model();
$Test->load(14);

echo "<pre>";
print_r($Test);
echo "</pre>";
*/
?>