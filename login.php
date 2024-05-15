
<?php
session_start();
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $errorMessage = "CSRF token validation failed";
        header("Location: loginError.php?message=" . urlencode($errorMessage)); 
    exit();
}


require_once("main.css");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //$id = $_POST["id"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $filename = "user.txt";
    $file = file($filename);
    $flag = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email format. Please enter a valid email address.";
        header("Location: loginError.php?message=" . urlencode($errorMessage)); 
        exit();
    }
    
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
        $errorMessage= "Invalid ID or password. Please try again.";
        header("Location: loginError.php?message=" . urlencode($errorMessage));
        exit();
    }
    }
    

   

    
    
}
?>

