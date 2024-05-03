
<?php
include_once"../Models/DonationDetails/DonationDetailsClass.php";
include_once"../Models/DonationType/DonationTypeClass.php";
include_once"../View/DonationDetailsView.php";
include_once"../View/AddDonationForm.php";
$Command=$_GET["Command"];

if ($Command=="Show"){
$obj=new DonationDetails();
$type=new DonationType();
$objview= new DonationDetailsView();
$don=$obj->getDonationDetById($_GET["Id"]);
$t=$type->getDonationTypeById($don->TypeId);
$objview->showDonationDetails($don,$t);
}
if ($Command=="Add"){
    $newobj= new GenerateDonationForm();
    $newobj->generateDonationForm();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj = new DonationDetails();

        $date = $_POST["Date"];
        $donorId = $_POST["DonorId"];
        $RecipientId = $_POST["RecipientId"];
        $time = date("h:i:sa");
        $feedback = $_POST["Feedback"];
        $TypeId = $_POST["DonationTypeId"];
        $Rating = $_POST["Rating"];
        $lastId = $obj->mainobj->getLastId($obj->mainobj->filename,$obj->mainobj->separator);
        $id = $lastId + 1;
        $DonationInfo = "$id~$date~$RecipientId~$donorId~$feedback~$time~$Rating~$TypeId\n";
        
        $obj->InsertDonation($DonationInfo);
        

    }
    
       
}
if($Command=="Edit"){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST["id"];
        $date = $_POST["Date"];
        $donorId = $_POST["DonorId"];
        $RecipientId = $_POST["RecipientId"];
        $time = $_POST["time"];
        $feedback = $_POST["Feedback"];
        $TypeId = $_POST["DonationTypeId"];
        $Rating = $_POST["Rating"];
        $DonationInfo = "$id~$date~$RecipientId~$donorId~$feedback~$time~$Rating~$TypeId\n";

        $obj = new DonationDetails();
        $obj->handleDonationEdit($DonationInfo);

       
    }
   
}

if($Command=="Delete"){
   

}
   

?>

