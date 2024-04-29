
<?php
include_once"../Models/DonationType/DonationTypeClass.php";
include_once"../View/DonationTypeView.php";
include_once"../View/AddDonationTypeForm.php";

$Command=$_GET["Command"];

if ($Command=="Show"){
$obj=new DonationType();
$objView=new DonationTypeView();
$DonType=$obj->getDonationTypeById($_GET["DonId"]);
$objView->showDonationType($DonType);
}

if($Command=="Add"){
    $newobj= new GenerateDonationTypeForm();
    $newobj->generateDonationType();
}


?>
