	<!-- this page renders the html for the customer details page

	Username
	Firstname
	Lastname
	Email
	Telephone -->
<?php 

// require_once("customer.php"); required for test

class CustomerView{


	public function render($oCustomer){

	$sHTML = "";

	$sHTML .= '<div id="title">My Details</div>
                    <div id="details">

                
                    <h3>User Name:</h3><p>'.$oCustomer->UserName.'</p>
                    <h3>First Name:</h3><p>'.$oCustomer->FirstName.'</p>
                    <h3>Last Name:</h3><p>'.$oCustomer->LastName.'</p>
                    <h3>Email:</h3><p>'.$oCustomer->Email.'</p>
                    <h3>Telephone:</h3><p>'.$oCustomer->Telephone.'</p>

                    <a href="editCustomer.php">Edit</a>
                   
                     </div>';

    return $sHTML;
	}
}



// $oCustomer = new Customer();
// $oCV = new CustomerView();

// // $oCustomer = new Customer();
// $oCustomer-> FirstName = "Andy";
// $oCustomer-> LastName = "Pandy";
// $oCustomer-> Telephone = 0210461869;
// $oCustomer-> Email = "andy.pandy@gmail.com";
// $oCustomer-> UserName = "andyPandy";
// $oCustomer-> Password = "boom";

// echo $oCV->render($oCustomer);


 ?>

