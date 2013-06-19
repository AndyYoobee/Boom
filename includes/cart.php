<?php

Class Cart{
	
	private $aContent;

	public function __construct(){

		$this-> aContent = array();
	}


	public function add($iModelID, $iQuantity){

		//array_push($this-> aContent, '$iModelID', '$iQuantity');

		if(isset($this-> aContent[$iModelID]) == false){

			$this-> aContent[$iModelID] = $iQuantity;

		} else {

			$this-> aContent[$iModelID] += $iQuantity;

		}
		
	}
    

    public function remove($iModelID, $iQuantity){

      $this-> aContent[$iModelID] -= $iQuantity;

      if($this-> aContent[$iModelID] <= 0){

      	unset($this-> aContent[$iModelID]);

      }

    }


    public function __get($_Property){
    	switch($_Property){
    		case "Content":
    			return $this-> aContent;
    			break;
    		default:
    			die($_Property ." is not allowed to read from(cart getter)");
    	}
    }

}

/*
$oCart = new Cart();

$oCart->add("BMW", 2);
$oCart->add("Aston", 4);
$oCart->remove("Aston", 5);

echo "<pre>";
print_r($oCart);
echo "</pre>";
*/

?>