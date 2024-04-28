
<?php
include_once"Function.php";
include_once"UserView.php";
include_once"UserForm.php";

$Command=$_GET["Command"];

if ($Command=="Show"){
$obj=new User();
$objView= new UserView();
$user=$obj->getUserById($_GET["DonId"]);
$objView->showUser($user);
}

if($Command=="Add"){
    $newobj= new GenerateUserForm();
    $newobj->generateUserForm();
}



?>
