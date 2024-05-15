
<?php
include_once"../Models/DonationDetails/DonationDetailsClass.php";
include_once"../Models/DonationType/DonationTypeClass.php";
include_once"../Controllers/DonationController.php";
include_once"../View/DonationDetailsView.php";
include_once"../View/AddDonationForm.php";
$Command=$_GET["Command"];

if ($Command=="Show"){
$obj=new DonationDetails();
$type=new DonationType();
$objview= new DonationDetailsView();
$don=$obj->getById($_GET["Id"]);
$t=$type->getById($don->TypeId);
$objview->showDonationDetails($don,$t);
}
if ($Command=="Add"){
   
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
        $obj->Insert($DonationInfo);
        

    }
    else{$newobj= new GenerateDonationForm();
        $newobj->generateDonationForm();}
    
       
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
        $obj->handleEdit($DonationInfo);

       
    }
   
}

if($Command=="Delete"){
    $obj=new DonationDetails();
    if (isset($_GET['id']) && $_GET['id'] !== '') {
        $DonationIdToDelete = $_GET['id'];
        $obj->delete($DonationIdToDelete);
        header("Location:../View/DonationDetails.php");
        exit(); 
    }

}
   

?>

