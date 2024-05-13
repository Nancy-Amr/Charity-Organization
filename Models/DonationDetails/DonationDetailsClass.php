<?php
include_once"../Function.php";
include_once"../Controllers/DonationController.php";

class DonationDetails{
    public $filename;
    public $separator;
    public $Id;
    public $date;
    public $feedback;
    public $recipient;
    public $DonorId;
    public $time;
    public $Rating;
    public $TypeId;
    public $mainobj;
    
    function __construct(){
        $this->mainobj=new Main();
        $this->mainobj->filename="../DonationDetails.txt";
        $this->mainobj->separator="~";
    }
   function getDonationDetById($Id){
        $line=$this->mainobj->getLineWithId($Id,$this->mainobj->filename,$this->mainobj->separator);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->mainobj->separator, $line);
        // $donation= new DonationDetails();
        $this->Id = $ArrayLine[0];
        $this->date = $ArrayLine[1];
        $this->recipient = $ArrayLine[2];
        $this->DonorId = $ArrayLine[3];
        $this->feedback = $ArrayLine[4];
        $this->time = $ArrayLine[5];
        $this->Rating = $ArrayLine[6];
        $this->TypeId = $ArrayLine[7];
        
        return $this;
        }
    } 
    function ListallDonationDetails(){
        $arr=[];
        $i=0;
        $file = fopen($this->mainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->mainobj->separator, $line);
        $donation = new DonationDetails();
       $arr[$i]=$donation->getDonationDetById($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }
    function InsertDonation($DonationInfo)
{
    
        $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
        fwrite($file, $DonationInfo);
        fclose($file);
        header("Location:../View/DonationDetails.php");
        exit();
       
    
}
function handleDonationEdit($DonationInfo)
{
    $Donation = explode($this->mainobj->separator, $DonationInfo);
     // Read user data from file
     $filename = $this->mainobj->filename;
     $file = file($filename);
        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $DonationData = explode($this->mainobj->separator, $line);
            if ($DonationData[0] == $Donation[0]) {
                $file[$key] = $DonationInfo;
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
        // $obj=new Donation();
        // $obj->handleDonationEdit($DonationInfo);
    
}


function deleteDonation($Id, $filename) {
    // Read user data from file
    $file = file($filename);

    // Iterate over each line in the file
    foreach ($file as $key => $line) {
        $DonationData = explode($this->mainobj->separator, $line);
        // Check if the ID matches
        if ($DonationData[0] == $Id) {
            // Remove the line corresponding to the user
            #unset($file[$key]);
            $file[$key] = "";
            // Write updated user data back to file
            file_put_contents($filename, implode("", $file));
            
        
        }
    }
    // $obj=new Donation();
    // $obj->deleteDonation($Id, $obj->mainobj->filename);
}
}







?>