<?php

include_once "../Function.php";
include_once "../Models/UserType/UserTypeClass.php";

$obj=new UserType();

if (isset($_GET['id']) && $_GET['id'] !== '') {
    // The delete button is clicked
    // Perform deletion logic here
    $IdToDelete = $_GET['id'];
    // Call a function to handle user deletion
    $obj->deleteType($IdToDelete, $obj->UTmainobj->filename);
    
    // Redirect back to the user.php page after deletion
    header("Location:userT.php");
    exit(); // Ensure no further code execution after redirection
}

?>
