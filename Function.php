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



function InsertUser()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["Username"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $email = $_POST["Email"];
        $lastId = 0;
        $file = fopen("user.txt", "r+") or die("Unable to open file!");
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
        $file = fopen("user.txt", "a+") or die("Unable to open file!");
        fwrite($file, $userInfo);
        fclose($file);
        header("Location:user.php");
        exit();
    }
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





?>
