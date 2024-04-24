
<?php
include_once"Function.php";
include_once"DonationTypeView.php";
$obj=new DonationType();
$objView=new DonationTypeView();
$DonType=$obj->getDonationTypeById($_GET["DonId"]);
$objView->showDonationType($DonType);
?>
