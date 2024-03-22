<?php

function DrawTableFromFile($filename){
    $myfile = fopen($filename,"r+") or die("unable to open file!");
    while (!feof($myfile)) {
       
        $line = fgets($myfile);
        echo "<tr>";
        $ArrayLine = explode("~", $line);

        for ($i = 0; $i < count($ArrayLine); $i++) 
        {
             echo "<td>".$ArrayLine[$i]."</td>" ;
        }
        echo "</tr>";
    }
fclose($myfile);

}

function InsertUser(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $username = $_POST["Username"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $email = $_POST["Email"];
        $lastId = 0;
    $file=fopen("user.txt","r+")or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $userInfo = explode("~", $line);
        if (isset($userInfo[0]) && is_numeric($userInfo[0])) {
            $lastId = intval($userInfo[0]);
        }
    }
    fclose($file);
    $id = $lastId + 1;
    $userInfo = "$id~$username~$phone~$address~$email\n";
    $file=fopen("user.txt","a+")or die("Unable to open file!");
    fwrite($file, $userInfo);
    fclose($file);
    header("Location:user.php");
    exit();
    }
}

?>