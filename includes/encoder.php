<?php

Class Encoder{

	static public function encode($sPassword){

	$sNewPassword = hash('md5',$sPassword);
	return $sNewPassword;
	}

    

}


?>