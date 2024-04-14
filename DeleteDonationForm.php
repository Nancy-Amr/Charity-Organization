<?php

include_once "Function.php";
$obj=new DonationDetails();
if (isset($_GET['id']) && $_GET['id'] !== '') {
    // The delete button is clicked
    // Perform deletion logic here
    $DonationIdToDelete = $_GET['id'];
    // Call a function to handle user deletion
    $obj->deleteDonation($DonationIdToDelete, $obj->mainobj->filename);
    // Redirect back to the user.php page after deletion
    header("Location: Donation.php");
    exit(); // Ensure no further code execution after redirection
}

?>
