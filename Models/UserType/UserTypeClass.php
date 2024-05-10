<?php

include_once"../Function.php";

class UserType{
    public $type;
   
    public $id;
   
    public $UTmainobj;

    function __construct(){
        $this->UTmainobj=new Main();
        $this->UTmainobj->filename="../userT.txt";
        $this->UTmainobj->separator="~";
    }

    // function gettypebyID($id){
    //     $line=$this->UTmainobj->getLineWithId($id,$this->UTmainobj->filename,$this->UTmainobj->separator);
    //     $ArrayLine = explode($this->UTmainobj->separator, $line);
    //     $Utype= new UserType();
    //     $Utype->id = $ArrayLine[0];
    //     $Utype->type = $ArrayLine[1];
        
    //     return $Utype;
    // } 

    function gettypebyID($id){
        $line = $this->UTmainobj->getLineWithId($id, $this->UTmainobj->filename, $this->UTmainobj->separator);
        
        // Check if data is retrieved successfully
        if (empty($line)) {
            // Handle the case where no data is found for the ID
            return null;
        }
        
        $ArrayLine = explode($this->UTmainobj->separator, $line);
      
        // Check if there are at least 2 elements in the array before accessing them
        if (count($ArrayLine) < 2) {
            // Handle the case where the data has less elements than expected
            return null;
        }
      
        $Utype = new UserType();
        $Utype->id = $ArrayLine[0];
        $Utype->type = $ArrayLine[1];
        
        return $Utype;
      }
      
    function ListallUtypes(){
        $arr=[];
        $i=0;
        $file = fopen($this->UTmainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->UTmainobj->separator, $line);
       $arr[$i]=$this->gettypebyID($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }
    function InsertType()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $id = $_POST["id"];
        $type = $_POST["type"];
        $lastId = $this->UTmainobj->getLastId($this->UTmainobj->filename,$this->UTmainobj->separator);
        $Id = $lastId + 1;
        $typeinfo = "$Id~$type\n";
        $file = fopen($this->UTmainobj->filename, "a+") or die("Unable to open file!");
        fwrite($file, $typeinfo);
        fclose($file);
        header("Location:../View/userT.php");

        // $obj=new UserType();
        // $obj->InsertType($id,$type);
        exit();
       
    }

    
}
// function handleTypeEdit()
// {
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $id = $_POST["id"];
//         $type= $_POST["type"];
//         $filename = $this->UTmainobj->filename;
//         $file = file($filename);


//         // Iterate over each line in the file
//         foreach ($file as $key => $line) {
//             $Types = explode("~", $line);
//             if ($Types[0] == $id) {
//                 $file[$key] = "$id~$type\n";
//                 break;
//             }
//         }

//         // Write updated user data back to file
//         file_put_contents($filename, implode("", $file));
//         $obj=new UserType();
//         $obj->handleTypeEdit($id,$type);
//     }
// }
function handleTypeEdit()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $type = $_POST["Type"];
        

        // Read user data from file
        $filename = $this->UTmainobj->filename;
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $userData = explode($this->UTmainobj->separator, $line);
            // Check if the ID matches
            if ($userData[0] == $id) {
                // Update user data
                $file[$key] = "$id~$type\n";
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));

    }
}

function deleteType($id, $filename) {
    // Read user data from file
    $file = file($filename);

    // Iterate over each line in the file
    foreach ($file as $key => $line) {
        $type = explode("~", $line);
        // Check if the ID matches
        if ($type[0] == $id) {
            // Remove the line corresponding to the user
            #unset($file[$key]);
            $file[$key] = "";
            // Write updated user data back to file
            file_put_contents($filename, implode("", $file));
            
        
        }
    }
}
}

?>