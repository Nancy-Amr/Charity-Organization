<?php
include_once "../Models/DonationDetails/DonationDetailsClass.php";
include_once "../Models/DonationType/DonationTypeClass.php";
include_once "../Controllers/DonationController.php";
include_once "../View/DonationDetailsView.php";
include_once "../View/AddDonationForm.php";

$Command = $_GET["Command"];

if ($Command == "Show") {
    // Example of showing donation details
    $obj = new DonationDetails();
    $type = new DonationType();
    $objView = new DonationDetailsView();
    $don = $obj->getById($_GET["Id"]);
    $t = $type->getById($don->TypeId);
    $objView->showDonationDetails($don, $t);
}

if ($Command == "Add") {
    // Example of adding a new donation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj = new DonationDetails();

        // Get data from the form submission
        $date = $_POST["Date"];
        $donorId = $_POST["DonorId"];
        $RecipientId = $_POST["RecipientId"];
        $time = date("h:i:sa");
        $feedback = $_POST["Feedback"];
        $TypeId = $_POST["DonationTypeId"];
        $Rating = $_POST["Rating"];

        // Generate a unique ID
        $lastId = $obj->mainobj->getLastId($obj->mainobj->filename, $obj->mainobj->separator);
        $id = $lastId + 1;

        // Prepare donation information
        $DonationInfo = "$id~$date~$RecipientId~$donorId~$feedback~$time~$Rating~$TypeId\n";

        // Insert the donation
        $obj->Insert($DonationInfo);
    } else {
        // Show the form to add a new donation
        $newObj = new GenerateDonationForm();
        $newObj->generateDonationForm();
    }
}

if ($Command == "Edit") {
    // Example of editing an existing donation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get data from the form submission
        $id = $_POST["id"];
        $date = $_POST["Date"];
        $donorId = $_POST["DonorId"];
        $RecipientId = $_POST["RecipientId"];
        $time = $_POST["time"];
        $feedback = $_POST["Feedback"];
        $TypeId = $_POST["DonationTypeId"];
        $Rating = $_POST["Rating"];

        // Prepare donation information
        $DonationInfo = "$id~$date~$RecipientId~$donorId~$feedback~$time~$Rating~$TypeId\n";

        // Handle the donation edit
        $obj = new DonationDetails();
        $obj->handleEdit($DonationInfo);
    }
}

if ($Command == "Delete") {
    // Example of deleting a donation
    $obj = new DonationDetails();
    if (isset($_GET['id']) && $_GET['id'] !== '') {
        $DonationIdToDelete = $_GET['id'];
        $obj->delete($DonationIdToDelete);
        header("Location:../View/DonationDetails.php");
        exit();
    }
}

