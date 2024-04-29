<?php

include_once "../Models/VolunteeringOpp/VolunteeringOppClass.php";
$obj=new VolunteeringOppurtunity();
if (isset($_GET['id']) && $_GET['id'] !== '') {
    // The delete button is clicked
    // Perform deletion logic here
    $OppIdToDelete = $_GET['id'];
    // Call a function to handle user deletion
    $obj->deleteOpp($OppIdToDelete, $obj->EXmainobj->filename);
    // Redirect back to the user.php page after deletion
    header("Location: VolunteeringOppurtunity.php");
    exit(); // Ensure no further code execution after redirection
}

