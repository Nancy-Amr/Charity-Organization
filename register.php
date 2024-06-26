<?php
// $registration_success = false;
// include_once "Models/User/UserClass.php";
include_once"Validate.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phoneNumber = $_POST["phone_number"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST['confirmPassword'];
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $val=new ValidateRegistration();
    $validationResult =$val->validateUsername($username);
    $passwordValidationResult =$val-> validatePassword($password);
    $PhonevalidationResult = $val->validatePhoneNumber($phoneNumber);
    if ($validationResult !== true) {
        $_SESSION['formData'] = $_POST;
        $_SESSION['errorMessage'] = $validationResult;
        header("Location:View/RegistrationPage.php");
        exit(); 
    }
   
    if ($PhonevalidationResult !== true) {
        $_SESSION['formData'] = $_POST;
        $_SESSION['errorMessage'] = $PhonevalidationResult;
        header("Location:View/RegistrationPage.php");
        exit(); 
    }
    
if ($passwordValidationResult !== true) {
    $_SESSION['errorMessage'] = $passwordValidationResult;
    $_SESSION['formData'] = $_POST; 
    header("Location:View/RegistrationPage.php");
    exit();
}
if ($password !== $confirmPassword) {
    $_SESSION['errorMessage'] = "Passwords do not match.";
    $_SESSION['formData'] = $_POST; 
    header("Location:View/RegistrationPage.php");
    exit();
}



    // Read the user type from the userT.txt file
    $user_type_file = "userT.txt";
    $user_type_data = file($user_type_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $user_type = "4"; // Default to "registered" user type (ID 4)
    if (!empty($user_type_data)) {
        $user_type = explode("~", end($user_type_data))[0];
    }

    // Read the last user ID from the file and increment it by one
    $filename = "user.txt";
    // Default value if no users exist yet
    $last_user_id = 0; 

    // Read the entire file into an array
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Check if the file is not empty
    if (!empty($lines)) {
        // Get the last line from the array
        $last_line = end($lines);

        // Extract the user ID from the last line
        $last_user_data = explode("~", $last_line);
        $last_user_id = intval($last_user_data[0]);

        /* //debugging id not being incremented
        echo "Last Line: $last_line<br>";
        echo "Last User ID: $last_user_id<br>";*/
    }

    // Increment the user ID
    $user_id = $last_user_id + 1;


    // Store the user data in the file
    $data = $user_id . '~' . $username . '~' . $phoneNumber . '~' . $address . '~' . $email . '~' . $hashed_password . '~' . $user_type . PHP_EOL;
    file_put_contents($filename, $data, FILE_APPEND);

    // $registration_success = true;
   
        $_SESSION['registration_success'] = true;
        header("Location:View/RegistrationPage.php");
    exit();
 
    
}


?>