<?php

include_once"../Function.php";
Class DonationType{
    public $type;
    public $filename;
    public $separator;
    public $Id;
    public $Description;

    function __construct(){
        $this->mainobj=new Main();
        $this->mainobj->filename="../DonationTypes.txt";
        $this->mainobj->separator="~";
    }

    function getDonationTypeById($Id){
        $line=$this->mainobj->getLineWithId($Id,$this->mainobj->filename,$this->mainobj->separator);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->mainobj->separator, $line);
        $donation = new DonationType();
        $donation->Id = $ArrayLine[0];
        $donation->type = $ArrayLine[1];
        $donation->Description = $ArrayLine[2];
        return $donation;
        }
    }
    function ListallDonationTypes(){
        $arr=[];
        $i=0;
        $file = fopen($this->mainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->mainobj->separator, $line);
       $arr[$i]=$this->getDonationTypeById($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }
    function deleteDonationType($Id, $filename) {
        $file = file($filename);
    
        foreach ($file as $key => $line) {
            $DonationTypeData = explode("~", $line);
            if ($DonationTypeData[0] == $Id) {
                
                $file[$key] = "";
                file_put_contents($filename, implode("", $file));
                
            
            }
        }
    }
    function InsertDonationType()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            $type = $_POST["Type"];
            $description = $_POST["Description"];
            $lastId = $this->mainobj->getLastId($this->mainobj->filename,$this->mainobj->separator);
            $id = $lastId + 1;
            $DonationTypeInfo = "$id~$type~$description\n";
            $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
            fwrite($file, $DonationTypeInfo);
            fclose($file);
            header("Location:../View/DonationType.php");
            exit();
           
        }
    }
    function handleDonationTypeEdit()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $type = $_POST["Type"];
        $Description = $_POST["Description"];
        
        $filename = $this->mainobj->filename;
        $file = file($filename);


        
        foreach ($file as $key => $line) {
            $DonationTypeData = explode($this->mainobj->separator, $line);
            if ($DonationTypeData[0] == $id) {
                $file[$key] = "$id~$type~$Description\n";
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
       
    }
}
}


?>