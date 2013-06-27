<?php


Class CartView{

  public function render($oCart){

    $sHTML = "";

    $fGrandTotal = 0;

    $sHTML .= '<div id="title">My Cart</div>
               <div id="cart">
              
              
                <div id="header1">Product</div>
                <div id="header2">Quantity</div>
                <div id="header3">Price</div>
                <div id="header4"></div>';

    $aContent = $oCart-> Content;

    foreach($aContent as $iModelID => $_Value){

      $oModel = new Model();
      $oModel-> load($iModelID);

      $oMake = new Make();
      $oMake-> load($oModel-> MakeID);

    

      $fTotal = $_Value * $oModel-> Price;
      $fGrandTotal += $fTotal;

    

    $sHTML .='
                <div id="product"><img src="'.$oModel-> Photopath.'" width="150px" height="75px "alt="" /><strong>'.$oMake-> MakeName.'</strong>'.' '.$oModel-> ModelName.'</div>
                <div id="quantity">'.$_Value.'</div>
                <div id="price">$'.number_format($fTotal,2).'</div>
                <div id="remove"><a href="remove.php?ModelID='.$oModel-> ModelID.'"><img src="assets/img/remove.png" width="20px" height="20px" alt="" /></a></div>';

                
          }

    $sHTML .='<div id="foot1"></div>
                <div id="foot2">Grand Total</div>
                <div id="foot3">$'.number_format($fGrandTotal,2).'</div>
                <div id="foot4"></div>

              </div>';


              return $sHTML;

  }


  
}


?>