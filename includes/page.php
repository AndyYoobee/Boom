<?php

require_once("db.php");


class Page{

	private $iPageID;
	private
	private
	private
	private
	private


	public function __construct(){

		$this-> iPageID = 0;
		$this->
		$this->
		$this->
		$this->
		$this->
	}

	public function Load($iPageID);

	$oDatabase = new Database();

	$sQuery = "
				SELECT PageID, *****, ******, ******, ******, ******
				FROM tb*****
				WHERE PageID=" .$iPageID;

	$oResult = $oDatabase-> query($sQuery);
	$aPage = $oDatabase-> fetch_array($oResult);



	$this-> iPageID = $aPage["PageID"];
	$this-> ******* = ******["******"];
	$this-> ******* = ******["******"];
	$this-> ******* = ******["******"];
	$this-> ******* = ******["******"];
	$this-> ******* = ******["******"];

	$oDatabase-> close();
}


?>