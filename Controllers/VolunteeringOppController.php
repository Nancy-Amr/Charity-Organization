
<?php
include_once"../Models/VolunteeringOpp/VolunteeringOppClass.php";

$Command=$_GET["Command"];


if ($Command=="Add"){
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj=new VolunteeringOppurtunity();
        $Id = $_POST["Id"];
        $title = $_POST["title"];
        $volunteer = $_POST["volunteer"];
        $location = $_POST["location"];
        $date = $_POST["date"];

        $lastId = $obj->EXmainobj->getLastId($obj->EXmainobj->filename,$obj->EXmainobj->separator);
        $id = $lastId + 1;
        $OppInfo = "$Id~$title~$volunteer~$location~$date\n";
        $obj->InsertOpp($OppInfo);
    }
       
}
if($Command=="Edit"){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj=new VolunteeringOppurtunity();

        $Id = $_POST["Id"];
        $title = $_POST["title"];
        $volunteer = $_POST["volunteer"];
        $location = $_POST["location"];
        $date = $_POST["date"];
        $OppInfo = "$Id~$title~$volunteer~$location~$date\n";
        $obj->handleOppEdit($OppInfo);

       
    }
   
}

if($Command=="Delete"){
    $obj=new VolunteeringOppurtunity();
    if (isset($_GET['id']) && $_GET['id'] !== '') {
        
        $OppIdToDelete = $_GET['id'];
        $obj->deleteOpp($OppIdToDelete, $obj->EXmainobj->filename);
        header("Location:../View/VolunteeringOppurtunity.php");
        exit(); 
    }

}
   

?>

