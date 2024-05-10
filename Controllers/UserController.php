
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

if($Command=="Edit"){
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $username = $_POST["Username"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        $usertype = $_POST["UserType"];
        $userinfo="$id~$username~$phone~$address~$email~$password~$usertype\n";
        $obj = new User();
        $obj->handleUserEdit($userinfo);
    }
}

?>
