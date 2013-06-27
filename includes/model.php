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


	public function save(){

		$oDatabase = new Database_Connection();

		if($this-> iModelID == 0){

			$sQuery = "
					INSERT INTO tbmodel (ModelName, Description, Price, MakeID, Stocklevel, Photopath, Active)
					VALUES (
							'".$oDatabase->escape_value($this-> sModelName)."',
							'".$oDatabase->escape_value($this-> sDescription)."',
							'".$oDatabase->escape_value($this-> iPrice)."',
							'".$oDatabase->escape_value($this-> iMakeID)."',
							'".$oDatabase->escape_value($this-> iStocklevel)."',
							'".$oDatabase->escape_value($this-> sPhotopath)."',
							'".$oDatabase->escape_value($this-> iActive)."'
							)";

		$oResult = $oDatabase-> query($sQuery);

		$this-> iModelID = $oDatabase-> get_insert_id();

		} else {

			$sQuery = "
					UPDATE tbmodel
					SET ModelName = '".$oDatabase->escape_value($this-> sModelName)."',
						Description = '".$oDatabase->escape_value($this-> sDescription)."',
						Price = '".$oDatabase->escape_value($this-> iPrice)."',
						MakeID = '".$oDatabase->escape_value($this-> iMakeID)."',
						Stocklevel = '".$oDatabase->escape_value($this-> iStocklevel)."',
						Photopath = '".$oDatabase->escape_value($this-> sPhotopath)."',
						Active = '".$oDatabase->escape_value($this-> iActive)."'
					WHERE ModelID = " .$this-> iModelID;

					$oResult = $oDatabase-> query($sQuery);

		}

		$oDatabase-> close_connection();
	}


	public function __get($sProperty){

		switch ($sProperty){

			case "ModelID":
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
			 	break;
			default:
			die($sProperty ." can not be read from without the Magic Word. Sorry Darling");
		}
	}

	public function __set($_Property, $_Value){

		switch ($_Property){

			case "ModelName":
				$this-> sModelName = $_Value;
				break;
			case "Description":
				$this-> sDescription = $_Value;
				break;
			case "Price":
				$this-> iPrice = $_Value;
				break;
			case "MakeID":
				$this-> iMakeID = $_Value;
				break;
			case "Stocklevel":
				$this-> iStocklevel = $_Value;
				break;
			case "Photopath":
				$this-> sPhotopath = $_Value;
				break;
			case "Active":
				$this-> iActive = $_Value;
				break;
			default:
				die($_Property. " is not allowed to write to (issue in model setter)");


		}
	}

}


/*
$Test = new Model();
$Test-> load(23);


$Test-> ModelName = "CLS 63 AMG";
$Test-> Description = "The 2013 Mercedes-Benz CLS 63 AMG boasts startlingly good acceleration for a sedan of its size, thanks to its powerful engine and our equipped performance package upgrades. It also manages to be quite comfortable thanks to an adaptive suspension, multiple drive modes, and a high level of cabin comfort amenities.";
$Test-> Price = 135000;
$Test-> MakeID = 4;
$Test-> Stocklevel = 2;
$Test-> Photopath = "assets/img/mercedes-cls.jpg";
$Test-> Active = 1;

$Test-> save();

echo "<pre>";
print_r($Test);
echo "</pre>";
*/

?>