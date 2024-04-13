<?php

include_once "Function.php";

if (isset($_GET['id']) && $_GET['id'] !== '') {
    // The delete button is clicked
    // Perform deletion logic here
    $userIdToDelete = $_GET['id'];
    // Call a function to handle user deletion
    deleteUser($userIdToDelete, "user.txt");
    // Redirect back to the user.php page after deletion
    header("Location: user.php");
    exit(); // Ensure no further code execution after redirection
}

?>
