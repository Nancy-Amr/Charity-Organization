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
        $this->mainobj->filename="../DonationDetails.txt";
        $this->mainobj->separator="~";
        $DonDetails=[];
    }
    function getDonationById($Id){
        $line=$this->mainobj->getLineWithId($Id,$this->mainobj->filename,$this->mainobj->separator);
        $ArrayLine = explode($this->mainobj->separator, $line);
        
        $this->Id = $ArrayLine[0];
        $this->date = $ArrayLine[1];

        
        return $this;
    } 
    function Listall(){
        $arr=[];
        $i=0;
        $file = fopen($this->mainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode($this->mainobj->separator, $line);
        $donation = new Donation();
       $arr[$i]=$donation->getDonationById($ArrayLine[0]);
       $i++;
        }
    }
    fclose($file);
    return $arr;
    }
//     function deleteDonation($Id, $filename) {
//         // Read user data from file
//         $file = file($filename);
    
//         // Iterate over each line in the file
//         foreach ($file as $key => $line) {
//             $DonationData = explode("~", $line);
//             // Check if the ID matches
//             if ($DonationData[0] == $Id) {
//                 // Remove the line corresponding to the user
//                 #unset($file[$key]);
//                 $file[$key] = "";
//                 // Write updated user data back to file
//                 file_put_contents($filename, implode("", $file));
                
            
//             }
//         }
//     }
//     function InsertDonation($DonationInfo)
// {
//         $Donation = explode($this->mainobj->separator, $DonationInfo);
//         $DonationData = "$Donation[0]~$Donation[1]\n";
//         $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
//         fwrite($file, $DonationData);
//         fclose($file);
        

//     }
//     function handleDonationEdit($DonationInfo)
// {
   
//         $filename = $this->mainobj->filename;
//         $file = file($filename);

//         $Donation = explode($this->mainobj->separator, $DonationInfo);
//         // Iterate over each line in the file
//         foreach ($file as $key => $line) {
//             $DonationData = explode($this->mainobj->separator, $line);
//             if ($DonationData[0] == $Donation[0]) {
//                 $file[$key] = "$Donation[0]~$Donation[1]\n";
//                 break;
//             }
//         }

//         // Write updated user data back to file
//         file_put_contents($filename, implode("", $file));
//         header("Location:../View/Donation.php");
//         exit();
//     }

}

?>