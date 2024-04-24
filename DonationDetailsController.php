
<?php
include_once"Function.php";
include_once"DonationDetailsView.php";
$obj=new DonationDetails();
$type=new DonationType();
$objview= new DonationDetailsView();
$don=$obj->getDonationDetById($_GET["Id"]);
$t=$type->getDonationTypeById($don->TypeId);
$objview->showDonationDetails($don,$t);

   

?>

