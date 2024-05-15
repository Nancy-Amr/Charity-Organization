<?php
include_once"../Models/Donation/DonationClass.php";
class DonationController{
public static function handleCommand($Command,$Donationinfo) {

if ($Command=="Show"){
    $obj=new Donation();
    $arr=[];
    $arr=$obj->Listall();
    return $arr;
}
// if($Command=="Add"){
//     $new=new Donation();
//     $new->InsertDonation($Donationinfo);
// }
}
   
}
?>