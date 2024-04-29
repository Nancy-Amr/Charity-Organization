
<?php
include_once"../Models/DonationDetails/DonationDetailsClass.php";
include_once"../Models/DonationType/DonationTypeClass.php";
include_once"../View/DonationDetailsView.php";
include_once"../View/AddDonationForm.php";
$Command=$_GET["Command"];

if ($Command=="Show"){
$obj=new DonationDetails();
$type=new DonationType();
$objview= new DonationDetailsView();
$don=$obj->getDonationDetById($_GET["Id"]);
$t=$type->getDonationTypeById($don->TypeId);
$objview->showDonationDetails($don,$t);
}
if ($Command=="Add"){
    $newobj= new GenerateDonationForm();
    $newobj->generateDonationForm();

}
   

?>

