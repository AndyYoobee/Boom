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

Properties from __get (Watch out for the Capital letters) : 
- MakeId
- MakelName
- Models

*/




class Form{

	private $sHTML;


	public function __construct(){

		$this-> sHTML = '<form action="" method="post">';
	}


	public function makeInput($sType, $sControlName, $sLabel){

		$this-> sHTML .= '<label for="'.$sControlName.'">'.$sLabel.':</label>
						  <input type="'.$sType.'" name="'.$sControlName.'" id="'.$sControlName.'" placeholder="Enter your '.$sLabel.'" class"" value=""/>';


	}

	public function makeInputTelephone($sControlName, $sLabel){


		$this-> sHTML .= '<label for="'.$sControlName.'">'.$sLabel.':</label>
						  <input type="tel" name="'.$sControlName.'" id="'.$sControlName.'" placeholder="Format: 027 62 06 620" pattern="[0-9]{10}" class"" value=""/>';

	}

	public function makeInputEmail($sControlName, $sLabel){


		$this-> sHTML .= '<label for="'.$sControlName.'">'.$sLabel.':</label>
						  <input type="email" name="'.$sControlName.'" id="'.$sControlName.'" placeholder="youremailBro@whatever.com" class"" value=""/>';

	}

	

	public function makeSubmit($sControlName,$sLabel){

		$this-> sHTML .= '<input name="'.$sControlName.'" id="'.$sControlName.'" type="submit" value="'.$sLabel.'" />';


	}

	public function __get($_Property){

		switch ($_Property){
			case "HTML":
				return $this-> sHTML.'</form>';
				break;
			default:
				die($_Property. " is not allowed to be read from (getter in the form");
		}
	}



}

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

?>