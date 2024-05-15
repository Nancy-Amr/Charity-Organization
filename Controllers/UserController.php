
<?php
include_once"../Models/User/UserClass.php";
include_once"../View/UserView.php";
include_once"../View/UserForm.php";

$Command=$_GET["Command"];

if ($Command=="Show"){
$obj=new User();
$objView= new UserView();
$user=$obj->getById($_GET["DonId"]);
$objView->showUser($user);
}

if($Command=="Add"){
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj = new User();

        $username = $_POST["Username"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        $usertype = $_POST["UserType"];
        $lastId = $obj->mainobj->getLastId($obj->mainobj->filename,"~");
        $id = $lastId + 1;


// Hash the password
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $UserInfo = "$id~$username~$phone~$address~$email~$password~$usertype\n";
        $obj->Insert($UserInfo);
    }
    else{
    $newobj= new GenerateUserForm();
    $newobj->generateUserForm();
    }

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
/*
// Check if the password field is not empty
if (!empty($password)) {
    // Hash the new password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
} else {
    // If password field is empty, keep the existing hashed password
    $hashed_password = "";
}*/
     
        $userinfo="$id~$username~$phone~$address~$email~$password~$usertype\n";
        $obj = new User();
        $obj->handleEdit($userinfo);
    }
}
if($Command=="Delete"){
    $obj=new User();
if (isset($_GET['id']) && $_GET['id'] !== '') {
    $userIdToDelete = $_GET['id'];
    $obj->delete($userIdToDelete);
    header("Location:../View/user.php");
    exit(); 
}

}

?>
