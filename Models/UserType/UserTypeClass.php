<?php

include_once"../Function.php";

class UserType implements CRUDOperations{
    public $type;
   
    public $id;
   
    public $UTmainobj;

    public $separator;

    public $filename;

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

    function getbyID($id){
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
      
        
        $this->id = $ArrayLine[0];
        $this->type = $ArrayLine[1];
        
        return $this;
      }
      
    function Listall(){
        $arr=[];
        $i=0;
        $file = fopen($this->UTmainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->UTmainobj->separator, $line);
        $UserT = new UserType();
       $arr[$i]=$UserT->getbyID($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }
    function Insert($Data)
{
    
        $file = fopen($this->UTmainobj->filename, "a+") or die("Unable to open file!");
        fwrite($file, $Data);
        fclose($file);
        header("Location:../View/userT.php");

        exit();
       
    

    
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
function handleEdit($Data)
{
    $UserT = explode($this->UTmainobj->separator, $Data);
        $filename = $this->UTmainobj->filename;
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $userData = explode($this->UTmainobj->separator, $line);
            // Check if the ID matches
            if ($userData[0] == $UserT[0]) {
                // Update user data
                $file[$key] = $Data;
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
        header("Location:../View/UserT.php");

    
}

function delete($Id) {
    $file = file($this->UTmainobj->filename);

    foreach ($file as $key => $line) {
        $UserTypeData = explode($this->UTmainobj->separator, $line);
        if ($UserTypeData[0] == $Id) {
            
            $file[$key] = "";
            file_put_contents($this->UTmainobj->filename, implode("", $file));
            
        
        }
    }
}
}

?>