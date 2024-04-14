<?php
include_once"Function.php";
$obj=new User();
$user=$obj->getUserById($_GET["DonId"]);
echo "Name:".$user->UserName."\t  Id:".$user->Id."\t  Phone:".$user->Phone."  Email:".$user->Email."  Address:".$user->Address;
?>