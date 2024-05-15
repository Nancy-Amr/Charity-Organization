<?php

include_once"../Function.php";
Class DonationType implements CRUDOperations{
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

    function getById($Id){
        $line=$this->mainobj->getLineWithId($Id,$this->mainobj->filename,$this->mainobj->separator);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->mainobj->separator, $line);
        
        $this->Id = $ArrayLine[0];
        $this->type = $ArrayLine[1];
        $this->Description = $ArrayLine[2];
        return $this;
        }
    }
    function Listall(){
        $arr=[];
        $i=0;
        $file = fopen($this->mainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->mainobj->separator, $line);
        $donationT = new DonationType();
       $arr[$i]=$donationT->getById($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }
    function delete($Id) {
        $file = file($this->mainobj->filename);
    
        foreach ($file as $key => $line) {
            $DonationTypeData = explode($this->mainobj->separator, $line);
            if ($DonationTypeData[0] == $Id) {
                
                $file[$key] = "";
                file_put_contents($this->mainobj->filename, implode("", $file));
                
            
            }
        }
    }
    function Insert($Data)
    {
       
            $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
            fwrite($file, $Data);
            fclose($file);
            header("Location:../View/DonationType.php");
            exit();
           
        
    }
    function handleEdit($Data)
{
    $DonationT = explode($this->mainobj->separator, $Data);
        $filename = $this->mainobj->filename;
        $file = file($filename);


        
        foreach ($file as $key => $line) {
            $DonationTypeData = explode($this->mainobj->separator, $line);
            if ($DonationTypeData[0] == $DonationT[0]) {
                $file[$key] = $Data;
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
        header("Location:../View/DonationType.php");
        exit();
    
}
}


?>