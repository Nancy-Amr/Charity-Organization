
<?php
include_once"../Models/VolunteeringOpp/VolunteeringOppClass.php";
include_once"../notify.php";

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
        $obj->Insert($OppInfo);
       $concatenatedData =" Id: ". $Id . ' | ' ." Title: ". $title . ' | ' ." Volunteer: ". $volunteer . ' | '. " Location: " . $location . ' | '." Date: " . $date;
       $subject = new ConcreteSubject();
        $obs = new ConcreteObserver("New Volunteer Opportunity has been added : ", $subject);
        $subject->setState($concatenatedData);
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
        $obj->handleEdit($OppInfo);

       
    }
   
}

if($Command=="Delete"){
    $obj=new VolunteeringOppurtunity();
    if (isset($_GET['id']) && $_GET['id'] !== '') {
        
        $OppIdToDelete = $_GET['id'];
        $obj->delete($OppIdToDelete);
        header("Location:../View/VolunteeringOppurtunity.php");
        exit(); 
    }

}
   

?>

