
<?php
include_once"../Models/User/UserClass.php";
include_once"../View/UserView.php";
include_once"../View/UserForm.php";

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
