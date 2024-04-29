<?php

include_once "../Function.php";
include_once "../Models/User/UserClass.php";
include_once "../Models/UserType/UserTypeClass.php";

$obj=new UserType();
$user= new User();
if (isset($_GET['id']) && $_GET['id'] !== '') {
    // The delete button is clicked
    // Perform deletion logic here
    $IdToDelete = $_GET['id'];
    // Call a function to handle user deletion
    $obj->deleteType($IdToDelete, $obj->UTmainobj->filename);
    $user->deleteUser($IdToDelete, $user->mainobj->filename);
    // Redirect back to the user.php page after deletion
    header("Location:user.php");
    exit(); // Ensure no further code execution after redirection
}

?>