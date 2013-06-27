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
	private $aFiles;


	public function __construct(){
		
		$this-> sHTML = '<form action="" method="post" enctype="multipart/form-data">';
		$this-> aData = array();
		$this-> aErrors = array();
		$this-> aFiles = array();

	}



	public function makeUploadFile($sLabel, $sControlName){
		$sErrorMessage = "";

		if(isset($this-> aErrors[$sControlName])){
			$sErrorMessage = $this-> aErrors[$sControlName];

		}

		$this-> sHTML .= '<label for="'.$sControlName.'">'.$sLabel.':</label>
						  <input type="file" name="'.$sControlName.'" id="'.$sControlName.'" class="form"/>
						  <div class="error">'.$sErrorMessage.'</div>';
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

	public function makeTextarea($sControlName, $sLabel){

		$sData = "";

		if(isset($this-> aData[$sControlName])){
			$sData = $this-> aData[$sControlName];

		}

		$sErrorMessage = "";

		if(isset($this-> aErrors[$sControlName])){
			$sErrorMessage = $this-> aErrors[$sControlName];

		}

		$this-> sHTML .= '<label for="'.$sControlName.'">'.$sLabel.':</label>
                        <textarea name="'.$sControlName.'" >'.$sData.'</textarea><div class="error">'.$sErrorMessage.'</div>';
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


	public function makeSelect($sControlName, $sLabel, $aOptions){

		$sData="";
		if(isset($this-> aData[$sControlName])){
			$sData = $this-> aData[$sControlName];
		}

		$this-> sHTML .= '
						<label for="'.$sControlName.'">'.$sLabel.'</label>
						<select name="'.$sControlName.'" id="'.$sControlName.'">';
		foreach($aOptions as $_Key=> $_Value){
			if($_Key==$sData){
				$this-> sHTML .= '<option value="'.$_Key.'" selected="selected">'.$_Value.'</option>';

			} else{
				$this-> sHTML .= '<option value="'.$_Key.'">'.$_Value.'</option>';
			}
		}
		$this-> sHTML .= '</select><br/>';
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

	public function raiseCustomError($sControlName,$sMessage){

		$this-> aErrors[$sControlName] = $sMessage;
	}

	public function checkImageUpload($sControlName){

		$aFile = $this->aFiles[$sControlName];
	
		$sError = "";

		if((!empty($aFile)) && ($aFile['error'] == 0)) {
		  //Check if the file is JPEG image and it's size is less than 350Kb
		  $filename = basename($aFile['name']);
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  if (($ext == "jpg") && ($aFile["type"] == "image/jpeg") && 
			($aFile["size"] < 45000000)) {
		     
		  } else {
		     $sError =  "Error: Only .jpg images under 350Kb are accepted for upload";
		  }
		} 
		else 
		{
		 $sError = "Error: No file uploaded";
		}

		//record error into errors array
		if($sError != ""){
			$this->aErrors[$sControlName] = $sError; 
		}
	}

	public function moveFile($sControlName, $sNewName){

		$aFile = $this-> aFiles[$sControlName];

		$sNewName = dirname(__FILE__).'/../'.$sNewName;
		// echo $sNewName;
		move_uploaded_file($aFile['tmp_name'],$sNewName);
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
			case "Files":
				$this-> aFiles = $_Value;
				break;
			default:
				die($_Property. " is not allowed to write to without the MAGIC WORD!!!");
		}
	}



}



// $oForm = new Form();

// $oForm-> makeTextarea("textarea", "Description");



// echo "<pre>";
// echo $oForm-> HTML;
// echo "</pre>";



?>