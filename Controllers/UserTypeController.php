
<?php
include_once"../Models/UserType/UserTypeClass.php";

include_once"../View/AddDonationForm.php";
$Command=$_GET["Command"];


if ($Command=="Add"){
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj=new UserType();
        $type = $_POST["type"];
        $lastId = $obj->UTmainobj->getLastId($obj->UTmainobj->filename,$obj->UTmainobj->separator);
        $Id = $lastId + 1;
        $typeinfo = "$Id~$type\n";
        $obj->InsertType($typeinfo);
        

    }
    
       
}
if($Command=="Edit"){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj=new UserType();
        $id = $_POST["id"];
        $type = $_POST["Type"];
        $typeinfo = "$id~$type\n";

        $obj->handleTypeEdit($typeinfo);

       
    }
   
}

if($Command=="Delete"){
    $obj=new UserType();

    if (isset($_GET['id']) && $_GET['id'] !== '') {
        
        $IdToDelete = $_GET['id'];
        $obj->deleteType($IdToDelete, $obj->UTmainobj->filename);
        
        header("Location:../View/userT.php");
        exit(); 
    }

}
   

?>

