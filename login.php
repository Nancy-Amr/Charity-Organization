
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //$id = $_POST["id"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $filename = "user.txt";
    $file = file($filename);
    $flag = false;

    
    foreach ($file as $line) {
        $userData = explode("~", $line);

        if (isset($userData) && !empty($userData)) {
            // Access userData elements here
            if ($userData[4] == $email) {
        
                if ($userData[4] == $email) {

         /*   // Check if the password matches
                    if (trim($userData[5]) == $password) {
                    $flag = true;
                    break;
            }*/

                  // Check if the password matches using password_verify(hashing)
             if (password_verify($password, trim($userData[5]))) {
                    $flag = true;
                }
            break; 
        }
        }
}
    }
    if($flag){
        if ($userData[4] == "admin@email.com") {
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
    

   

    
    
}
?>

