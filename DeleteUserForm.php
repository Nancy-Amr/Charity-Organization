<?php

include_once "Function.php";
$obj=new User();

if (isset($_GET['id']) && $_GET['id'] !== '') {
    // The delete button is clicked
    // Perform deletion logic here
    $userIdToDelete = $_GET['id'];
    // Call a function to handle user deletion
    $obj->deleteUser($userIdToDelete, $obj->mainobj->filename);
    // Redirect back to the user.php page after deletion
    header("Location: user.php");
    exit(); // Ensure no further code execution after redirection
}

?>
