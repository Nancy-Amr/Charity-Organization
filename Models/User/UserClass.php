<?php
include_once"../Function.php";
include_once"../Models/UserType/UserTypeClass.php";

class User{
    public $UserName;
    public $Id;
    public $Phone;
    Public $Address;
    public $Email;
    public $Password;
    function __construct(){
        $this->mainobj=new Main();
        $this->mainobj->filename="../user.txt";
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
    $this->Password=$ArrayLine[5];
    return $this;
} 
function DrawTableFromFile()
{
    $myfile = fopen($this->mainobj->filename, "r+") or die("unable to open file!");
    $obj=new UserType();
    while (!feof($myfile)) {

        $line = fgets($myfile);
        if (!empty(trim($line))) {  //skip empty line
            echo "<tr>";
            $ArrayLine = explode($this->mainobj->separator, $line);
            $type=$obj->gettypebyID($ArrayLine[0]);
            for ($i = 0; $i < count($ArrayLine); $i++) {
                echo "<td>" . $ArrayLine[$i] . "</td>";
            }
            echo"<td>".$type->type."</td>";
            if (isset($ArrayLine[0]) && !empty($ArrayLine[0])) {
                echo "<td><a href='../View/EditUserForm.php?action=edit&id={$ArrayLine[0]}'>Edit</a></td>";
                echo "<td><a href='../View/DeleteUserForm.php?action=delete&id={$ArrayLine[0]}'>Delete</a></td>";
            }
                
            echo "</tr>";
        }
    }
    fclose($myfile);

}
function handleUserEdit()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $username = $_POST["Username"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $email = $_POST["Email"];
        $password = $_POST["Password"];

        // Read user data from file
        $filename = $this->mainobj->filename;
        $file = file($filename);


        // Iterate over each line in the file
        foreach ($file as $key => $line) {
            $userData = explode($this->mainobj->separator, $line);
            // Check if the ID matches
            if ($userData[0] == $id) {
                // Update user data
                $file[$key] = "$id~$username~$phone~$address~$email~$password\n";
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));

    }
}


function deleteUser($userId) {
    $filename = $this->mainobj->filename;
    // Read user data from file
    $file = file($filename);

    // Iterate over each line in the file
    foreach ($file as $key => $line) {
        $userData = explode($this->mainobj->separator, $line);
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

function InsertUser()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["Username"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        $lastId = $this->mainobj->getLastId($this->mainobj->filename,"~");
        $id = $lastId + 1;
        $UserInfo = "$id~$username~$phone~$address~$email~$password\n";
        $file = fopen($this->mainobj->filename, "a+") or die("Unable to open file!");
        fwrite($file, $UserInfo);
        fclose($file);
        header("Location:../View/userTypeForm.php? Id= $id");
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
 //  $user->Password = $ArrayLine[5];

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


?>