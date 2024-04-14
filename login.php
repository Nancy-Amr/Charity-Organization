<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST["id"];
    $password = $_POST["password"];
    $filename = "user.txt";
    $file = file($filename);
    $flag = false;

    
    foreach ($file as $line) {
        $userData = explode("~", $line);
        
        if ($userData[0] == $id) {
            // Check if the password matches
            if (trim($userData[5]) == $password) {
                
                $flag = true;
            }
            break; 
        }
    }
    
    if($flag){
        if (substr($id, 0, 2) === "11") {
            header("Location: admin.php?Username=" . urlencode($userData[1]));
            exit(); 
        } else {
            
            header("Location: userApp.php?Username=" . urlencode($userData[1]));
            exit(); 
        }
    }
    else{
        echo "Invalid ID or password. Please try again.";
    }
    

   

    // Validate user credentials
    
}
?>
