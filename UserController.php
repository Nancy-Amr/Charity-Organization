
<?php
include_once"Function.php";
include_once"UserTypeView.php";
$obj=new User();
$objView= new UserTypeView();
$user=$obj->getUserById($_GET["DonId"]);
$objView->showUserType($user);
?>
