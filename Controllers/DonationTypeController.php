
<?php
include_once"../Models/DonationType/DonationTypeClass.php";
include_once"../View/DonationTypeView.php";
include_once"../View/AddDonationTypeForm.php";

$Command=$_GET["Command"];

if ($Command=="Show"){
$obj=new DonationType();
$objView=new DonationTypeView();
$DonType=$obj->getDonationTypeById($_GET["DonId"]);
$objView->showDonationType($DonType);
}

if($Command=="Add"){
    
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj = new DonationType();

        $type = $_POST["Type"];
        $description = $_POST["Description"];
        $lastId = $obj->mainobj->getLastId($obj->mainobj->filename,$obj->mainobj->separator);
        $id = $lastId + 1;
        $DonationTypeInfo = "$id~$type~$description\n";

     $obj->InsertDonationType($DonationTypeInfo);
     
    }  
    else{
        $newobj= new GenerateDonationTypeForm();
        $newobj->generateDonationType();
    }
}
if($Command=="Edit"){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $type = $_POST["Type"];
        $Description = $_POST["Description"];
        $DonationTypeInfo = "$id~$type~$Description\n";

        $obj=new DonationType();
        $obj->handleDonationTypeEdit($DonationTypeInfo);
        
    }
   
}
if($Command=="Delete"){
    $obj=new DonationType();
if (isset($_GET['id']) && $_GET['id'] !== '') {
    $DonationTypeIdToDelete = $_GET['id'];
    $obj->deleteDonationType($DonationTypeIdToDelete, $obj->mainobj->filename);
    header("Location:../View/DonationType.php");

    exit(); 
}

}

?>
