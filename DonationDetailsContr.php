<?php
include_once"Function.php";
$obj=new DonationDetails();
$user=$obj->getDonationDetById($_GET["Id"]);
header("Location:DonationDetails.php");
?>