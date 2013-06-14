<?php

/*

-----------------IMPORTANT---------------------

Methods of the Form class:



** makeInput ** : Renders the HTMl for an input textfield.
				  needs 3 Parameters to be parssed in : type, control name and label
				  Use this function to create the input for : - First Name
				  											  - Last Name
				  											  - User Name
				  											  - Password

** makeInputTelephone ** : Renders the HTMl for the Telephone input textfield

** makeInputEmail ** : Renders the HTMl for the Email input textfield

** makeSubmit ** : Renders the HTMl for the Submit button

** checkEmpty ** : Check for empty input fields


*/




class Form{

	private $sHTML;
	private $aData;
	private $aErrors;


	public function __construct(){

		$this-> sHTML = '<form action="" method="post">';
		$this-> aData = array();
		$this-> aErrors = array();

	}







	public function makeInput($sType, $sControlName, $sLabel){

		$sData = "";

		if(isset($this-> aData[$sControlName])){
			$sData = $this-> aData[$sControlName];

		}

		$sErrorMessage = "";

		if(isset($this-> aErrors[$sControlName])){
			$sErrorMessage = $this-> aErrors[$sControlName];

		}

		$this-> sHTML .= '<label for="'.$sControlName.'">'.$sLabel.':</label>
						  <input type="'.$sType.'" name="'.$sControlName.'" id="'.$sControlName.'" placeholder="Enter your '.$sLabel.'" class="form" value="'.$sData.'"/><div class="error">'.$sErrorMessage.'</div>';


	}








	public function makeInputTelephone($sControlName, $sLabel){

		$sData = "";

		if(isset($this-> aData[$sControlName])){
			$sData = $this-> aData[$sControlName];

		}

		$sErrorMessage = "";

		if(isset($this-> aErrors[$sControlName])){
			$sErrorMessage = $this-> aErrors[$sControlName];

		}


		$this-> sHTML .= '<label for="'.$sControlName.'">'.$sLabel.':</label>
						  <input type="tel" name="'.$sControlName.'" id="'.$sControlName.'" placeholder="Format: 027 62 06 620" pattern="[0-9]{10}" class="form" value="'.$sData.'"/><div class="error">'.$sErrorMessage.'</div>';

	}








	public function makeInputEmail($sControlName, $sLabel){

		$sData = "";

		if(isset($this-> aData[$sControlName])){
			$sData = $this-> aData[$sControlName];

		}

		$sErrorMessage = "";

		if(isset($this-> aErrors[$sControlName])){
			$sErrorMessage = $this-> aErrors[$sControlName];

		}


		$this-> sHTML .= '<label for="'.$sControlName.'">'.$sLabel.':</label>
						  <input type="email" name="'.$sControlName.'" id="'.$sControlName.'" placeholder="youremailBro@whatever.com" class="form" value="'.$sData.'"/><div class="error">'.$sErrorMessage.'</div>';

	}






	

	public function makeSubmit($sControlName,$sLabel){

		$this-> sHTML .= '<input name="'.$sControlName.'" id="'.$sControlName.'" type="submit" value="'.$sLabel.'" />';


	}







	public function checkEmpty($sControlName){

		$sData = "";

		if(isset($this-> aData[$sControlName])){
			$sData = trim($this-> aData[$sControlName]);

		}

		if(strlen($sData) == 0){
			$this-> aErrors[$sControlName] = "Must be filled!!";
		}

	}







	public function __get($_Property){

		switch ($_Property){
			case "HTML":
				return $this-> sHTML.'</form>';
				break;
			case "Validation":
				if(count($this-> aErrors) == 0 ){

					return true;
				} else{

					return false;
				}
			default:
				die($_Property. " is not allowed to be read from (getter in the form");
		}
	}







	public function __set($_Property, $_Value){

		switch ($_Property){
			case "Data":
				$this-> aData = $_Value;
				break;
			default:
				die($_Property. " is not allowed to write to without the MAGIC WORD!!!");
		}
	}



}


/*
$oForm = new Form();

$oForm-> makeInput("text","firstname", "First Name");
$oForm-> makeInput("text","lastname", "Last Name");
$oForm-> makeInputTelephone("telephone", "Phone Number");
$oForm-> makeInputEmail("email", "Email");
$oForm-> makeInput("text","username", "User Name");
$oForm-> makeInput("password","password", "Password");
$oForm-> makeSubmit("submit", "Click Me");


echo "<pre>";
echo $oForm-> HTML;
echo "</pre>";

*/

?>