<?php
include_once"../Function.php";
class Donation{
    public $filename;
    public $separator;
    public $Id;
    public $date;
    public $DonDetails;
    function __construct(){
        $this->mainobj=new Main();
        $this->mainobj->filename="../Donations.txt";
        $this->mainobj->separator="~";
        $DonDetails=[];
    }
    function getDonationById($Id){
        $line=$this->mainobj->getLineWithId($Id,$this->mainobj->filename,$this->mainobj->separator);
        $ArrayLine = explode($this->mainobj->separator, $line);
        $donation = new Donation();
        $donation->Id = $ArrayLine[0];
        $donation->date = $ArrayLine[1];

        // $objDonDet= new DonationDetails();
        // $alldet=[];
        // $alldet=$objDonDet->ListallDonationDetails();
        // for($i=0;$i<count($alldet);$i++){
        //     if($alldet[$i]->Id==$donation->Id){
        //     $DonDetails[$j]=$alldet[$i];
        //     $j++;
        // }

        // }
        
        return $donation;
    } 
    function ListallDonations(){
        $arr=[];
        $i=0;
        $file = fopen($this->mainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->mainobj->separator, $line);
       $arr[$i]=$this->getDonationById($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }
    function deleteDonation($Id, $filename) {
        // Read user data from file
        $file = file($filename);
    
        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $DonationData = explode("~", $line);
            // Check if the ID matches
            if ($DonationData[0] == $Id) {
                // Remove the line corresponding to the user
                #unset($file[$key]);
                $file[$key] = "";
                // Write updated user data back to file
                file_put_contents($filename, implode("", $file));
                
            
            }
        }
    }
    function InsertDonation($id,$date)
{
        $DonationInfo = "$id~$date\n";
        $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
        fwrite($file, $DonationInfo);
        fclose($file);
        //$obj=new Donation;
        header("Location:../View/Donation.php");
        exit();
    }
    function handleDonationEdit($id,$date)
{
   
        $filename = $this->mainobj->filename;
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $DonationData = explode($this->mainobj->separator, $line);
            if ($DonationData[0] == $id) {
                $file[$key] = "$id~$date~\n";
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
    }

}

?>