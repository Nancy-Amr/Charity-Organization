<?php
include_once"../Function.php";


class VolunteeringOppurtunity implements CRUDOperations{
    public $Id;

    public $title;
    public $volunteer;
    public $location;
    public $date;
    public $filename;
    public $separator;
    function __construct(){
        $this->EXmainobj=new Main();
        $this->EXmainobj->filename="../VolunteeringOppurtunity.txt";
        $this->EXmainobj->separator="~";
    }
    function getById($Id){
        $line=$this->EXmainobj->getLineWithId($Id,$this->EXmainobj->filename,$this->EXmainobj->separator);
        $ArrayLine = explode($this->EXmainobj->separator, $line);
        
        $this->Id = $ArrayLine[0];
        $this->title = $ArrayLine[1];
        $this->volunteer = $ArrayLine[2];
        $this->location = $ArrayLine[3];
        $this->date = $ArrayLine[4];
        return $this;
    } 
    
    function Listall(){
        $arr=[];
        $i=0;
        $file = fopen($this->EXmainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->EXmainobj->separator, $line);
        $opp = new VolunteeringOppurtunity();
       $arr[$i]=$opp->getById($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }


    function Insert($Data)
{
   
        $file = fopen($this->EXmainobj->filename, "a+") or die("Unable to open file!");

        fwrite($file, $Data);
        fclose($file);
        header("Location:../View/VolunteeringOppurtunity.php");

        //$obj=new VolunteeringOppurtunity();
        //$obj->InsertOpp();
        
        exit();
       
    
}
function handleEdit($Data)
{
    
        $Opp = explode($this->EXmainobj->separator, $Data);    
        $filename = $this->EXmainobj->filename;
        $file = file($filename);
        foreach ($file as $key => $line) {
            $OppData = explode($this->EXmainobj->separator, $line);
            if ($OppData[0] == $Opp[0]) {
                $file[$key] = $Data;
                break;
            }
        }
        // Write updated user data back to file
        if (!file_put_contents($filename, implode("", $file))) {
            echo "Failed to save changes.";
            return;
        }
        header("Location:../View/VolunteeringOppurtunity.php");
        exit();
    
}
/*function handleOppEdit()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Id = $_POST["Id"];
        $title = $_POST["title"];
        $volunteer = $_POST["volunteer"];
        $location = $_POST["location"];
        $date = $_POST["date"];

        // Read user data from file
        $filename = $this->EXmainobj->filename;
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $OppData = explode("~", $line);
            if ($OppData[0] == $Id) {
                $file[$key] = "$Id~$title~$volunteer~$location~$date\n";
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
        header("Location: VolunteeringOppurtunity.php");
        exit();
       // $obj=new VolunteeringOppurtunity();
       // $obj->handleOppEdit();
    }
}*/


function delete($Id) {
    
        // Open the file in read mode
        $file = fopen($this->EXmainobj->filename, "r+") or die("Unable to open file!");
    
        // Create a temporary file to store updated content
        $tempFile = fopen('temp.txt', 'w') or die("Unable to create temporary file!");
    
        // Iterate over each line in the file
        while (!feof($file)) {
            $line = fgets($file);
            // Check if the ID matches
            $OppData = explode($this->EXmainobj->separator, $line);
            if ($OppData[0] != $Id) {
                // Write the line to the temporary file if ID doesn't match
                fwrite($tempFile, $line);
            }
        }
    
        // Close both files
        fclose($file);
        fclose($tempFile);
    
        // Replace the original file with the temporary file
        rename('temp.txt', $this->EXmainobj->filename);
    
    
   /* // Read user data from file
   $file = file($filename);

    // Iterate over each line in the file
    foreach ($file as $key => $line) {
        $OppData = explode("~", $line);
        // Check if the ID matches

        if ($OppData[0] == $Id) {
            // Remove the line corresponding to the user
            #unset($file[$key]);
            $file[$key] = "";
            // Write updated user data back to file
            file_put_contents($filename, implode("", $file));
            
        
        }
    }
    $obj=new VolunteeringOppurtunity();
    $obj->deleteOpp($Id, $obj->EXmainobj->filename);*/
}
}


?>