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
        $donation= new DonationDetails();
        $donation->Id = $ArrayLine[0];
        $donation->date = $ArrayLine[1];
        $donation->recipient = $ArrayLine[2];
        $donation->DonorId = $ArrayLine[3];
        $donation->feedback = $ArrayLine[4];
        $donation->time = $ArrayLine[5];
        $donation->Rating = $ArrayLine[6];
        $donation->TypeId = $ArrayLine[7];
        
        return $donation;
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
       $arr[$i]=$this->getDonationDetById($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }
    function InsertDonation()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $date = $_POST["Date"];
        $donorId = $_POST["DonorId"];
        $RecipientId = $_POST["RecipientId"];
        $time = date("h:i:sa");
        $feedback = $_POST["Feedback"];
        $TypeId = $_POST["DonationTypeId"];
        $Rating = $_POST["Rating"];
        $lastId = $this->mainobj->getLastId($this->mainobj->filename,$this->mainobj->separator);
        $id = $lastId + 1;
        $DonationInfo = "$id~$date~$RecipientId~$donorId~$feedback~$time~$Rating~$TypeId\n";
        $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
        fwrite($file, $DonationInfo);
        fclose($file);
        DonationController::handleCommand("Add", $date, $id);
        exit();
       
    }
}
function handleDonationEdit()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $date = $_POST["Date"];
        $donorId = $_POST["DonorId"];
        $RecipientId = $_POST["RecipientId"];
        $time = date("h:i:sa");
        $feedback = $_POST["Feedback"];
        $TypeId = $_POST["DonationTypeId"];
        $Rating = $_POST["Rating"];
        // Read user data from file
        $filename = $this->mainobj->filename;
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $DonationData = explode($this->mainobj->separator, $line);
            if ($DonationData[0] == $id) {
                $file[$key] = "$id~$date~$RecipientId~$donorId~$feedback~$time~$Rating~$TypeId\n";
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
        $obj=new Donation();
        $obj->handleDonationEdit($id,$date);
    }
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
    $obj=new Donation();
    $obj->deleteDonation($Id, $obj->mainobj->filename);
}
}







?>