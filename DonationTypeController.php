
<?php
include_once"Function.php";
include_once"DonationTypeView.php";
include_once"AddDonationTypeForm.php";

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
