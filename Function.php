<?php

function DrawTableFromFile($filename)
{
    $myfile = fopen($filename, "r+") or die("unable to open file!");
    while (!feof($myfile)) {

        $line = fgets($myfile);
        if (!empty(trim($line))) {  //skip empty line
            echo "<tr>";
            $ArrayLine = explode("~", $line);

            for ($i = 0; $i < count($ArrayLine); $i++) {
                echo "<td>" . $ArrayLine[$i] . "</td>";
            }
            if (isset($ArrayLine[0]) && !empty($ArrayLine[0])) {
                echo "<td><a href='EditUserForm.php?action=edit&id={$ArrayLine[0]}'>Edit</a></td>";
                echo "<td><a href='DeleteUserForm.php?action=delete&id={$ArrayLine[0]}'>Delete</a></td>";
            }
            echo "</tr>";
        }
    }
    fclose($myfile);

}




function getLastId($fileName,$separator){
    if(!file_exists($fileName)){return 0;}
    $file = fopen("user.txt", "r+") or die("Unable to open file!");
    $lastId = 0;
    while (!feof($file)) {
        $line = fgets($file);
        $userInfo = explode($separator, $line);
        if ($userInfo[0]!="") {
            $lastId = $userInfo[0];
        }
    }
    fclose($file);
    return $lastId;
}



function handleUserEdit()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $username = $_POST["Username"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $email = $_POST["Email"];

        // Read user data from file
        $filename = "user.txt";
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $userData = explode("~", $line);
            // Check if the ID matches
            if ($userData[0] == $id) {
                // Update user data
                $file[$key] = "$id~$username~$phone~$address~$email\n";
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));

    }
}


function deleteUser($userId, $filename) {
    // Read user data from file
    $file = file($filename);

    // Iterate over each line in the file
    foreach ($file as $key => $line) {
        $userData = explode("~", $line);
        // Check if the ID matches
        if ($userData[0] == $userId) {
            // Remove the line corresponding to the user
            #unset($file[$key]);
            $file[$key] = "";
            // Write updated user data back to file
            file_put_contents($filename, implode("", $file));
            
        
        }
    }
}


class Main{
    public $filename;
    public $separator;
    function getLineWithId($Id,$filename,$separator){
        if(!file_exists($filename)){return 0;}
        $file = fopen($filename, "r+") or die("Unable to open file!");
        while (!feof($file)) {
            $line = fgets($file);
            $ArrayLine = explode($separator, $line);
            if ($ArrayLine[0]==$Id) {
                fclose($file);
                return $line;
            }
        }
        fclose($file);
        return false;
    }
    function getLastId($filename,$separator){
        if(!file_exists($filename)){return 0;}
        $file = fopen($filename, "r+") or die("Unable to open file!");
        $lastId = 0;
        while (!feof($file)) {
            $line = fgets($file);
            $Info = explode($separator, $line);
            if ($Info[0]!="") {
                $lastId = (int)$Info[0];
            }
        }
        fclose($file);
        return $lastId;
    }
}
class User{
    public $UserName;
    public $Id;
    public $Phone;
    Public $Address;
    public $Email;
    function __construct(){
        $this->mainobj=new Main();
        $this->mainobj->filename="user.txt";
        $this->mainobj->separator="~";
    }
  function getUserById($Id){
    $x=$this->mainobj->getLineWithId($Id,$this->mainobj->filename,$this->mainobj->separator);
    $ArrayLine = explode($this->mainobj->separator, $x);
    $this->Id=$ArrayLine[0];
    $this->UserName=$ArrayLine[1];
    $this->Phone=$ArrayLine[2];
    $this->Address=$ArrayLine[3];
    $this->Email=$ArrayLine[4];
    return $this;
} 
function InsertUser()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["Username"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $email = $_POST["Email"];
        $lastId = getLastId($this->mainobj->filename,"~");
        $id = $lastId + 1;
        $DonationInfo = "$id~$username~$phone~$address~$email\n";
        $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
        fwrite($file, $DonationInfo);
        fclose($file);
        header("Location:user.php");
        exit();
    }
}
// function getUserByName($name){
//     if(!file_exists($fileName)){return 0;}
//     $file = fopen($this->mainobj->$filename, "r+") or die("Unable to open file!");
//     while (!feof($file)) {
//         $line = fgets($file);
//         $x = explode($this->mainobj->$separator, $line);
//         if ($x[1]==$name) {
//             $ArrayLine = explode($this->mainobj->separator, $x);
// $user->Id = $ArrayLine[0];
// $user->UserName = $ArrayLine[1];
// $user->Phone = $ArrayLine[2];
// $user->Address = $ArrayLine[3];
// $user->Email = $ArrayLine[4];

//     return $user;
//         }
//     }
//     fclose($file);
    
// }
// function ListallUsers(){
//     $arr=array();
//     $i=0;
//     $file = fopen($this->mainobj->filename, "r+") or die("Unable to open file!");
// while (!feof($file)) {
//     $line = fgets($file);
//     $ArrayLine = explode($this->mainobj->separator, $line);
//    $arr[$i]=getUserById($ArrayLine[0]);
//    $i++;
// }
// fclose($file);
// return $arr;
// }
}
class Donation{
    public $filename;
    public $separator;
    public $Id;
    public $date;
    public $DonDetails;
    function __construct(){
        $this->mainobj=new Main();
        $this->mainobj->filename="Donations.txt";
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
        $ArrayLine = explode($this->mainobj->separator, $line);
       $arr[$i]=$this->getDonationById($ArrayLine[0]);
       $i++;
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
        $obj=new Donation;
        header("Location:Donation.php");
        exit();
    }
    function handleDonationEdit($id,$date)
{
   
        $filename = $this->mainobj->filename;
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $DonationData = explode("~", $line);
            if ($DonationData[0] == $id) {
                $file[$key] = "$id~$date~\n";
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
    }

}

    

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
    public $mainobj;
    
    function __construct(){
        $this->mainobj=new Main();
        $this->mainobj->filename="DonationDetails.txt";
        $this->mainobj->separator="~";
    }
   function getDonationDetById($Id){
        $line=$this->mainobj->getLineWithId($Id,$this->mainobj->filename,$this->mainobj->separator);
        $ArrayLine = explode($this->mainobj->separator, $line);
        $donation= new DonationDetails();
        $donation->Id = $ArrayLine[0];
        $donation->date = $ArrayLine[1];
        $donation->recipient = $ArrayLine[2];
        $donation->DonorId = $ArrayLine[3];
        $donation->feedback = $ArrayLine[4];
        $donation->time = $ArrayLine[5];
        $donation->Rating = $ArrayLine[6];
        
        return $donation;
    } 
    function ListallDonationDetails(){
        $arr=[];
        $i=0;
        $file = fopen($this->mainobj->filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $ArrayLine = explode($this->mainobj->separator, $line);
       $arr[$i]=$this->getDonationDetById($ArrayLine[0]);
       $i++;
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
        $rating = $_POST["Rating"];
        $lastId = $this->mainobj->getLastId($this->mainobj->filename,"~");
        $id = $lastId + 1;
        $DonationInfo = "$id~$date~$RecipientId~$donorId~$feedback~$time~$rating\n";
        $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
        fwrite($file, $DonationInfo);
        fclose($file);
        $obj=new Donation();
        $obj->InsertDonation($id,$date);
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
        $feedback = $_POST["Rating"];
        // Read user data from file
        $filename = $this->mainobj->filename;
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $DonationData = explode("~", $line);
            if ($DonationData[0] == $id) {
                $file[$key] = "$id~$date~$RecipientId~$donorId~$feedback~$time~$Rating\n";
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
    $obj=new Donation();
    $obj->deleteDonation($Id, $obj->mainobj->filename);
}
}



?>
