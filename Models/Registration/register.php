<?php
// $registration_success = false;

include_once "../User/UserClass.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phoneNumber = $_POST["phone_number"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST['confirmPassword'];
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $validationResult = validateUsername($username);
    $passwordValidationResult = validatePassword($password);
    $PhonevalidationResult = validatePhoneNumber($phone);
    if ($validationResult !== true) {
        $_SESSION['formData'] = $_POST;
        $_SESSION['errorMessage'] = $validationResult;
        header("Location:../View/RegistrationPage.php");
        exit(); 
    }
   
    if ($PhonevalidationResult !== true) {
        $_SESSION['formData'] = $_POST;
        $_SESSION['errorMessage'] = $PhonevalidationResult;
        header("Location:../View/RegistrationPage.php");
        exit(); 
    }
    
if ($passwordValidationResult !== true) {
    $_SESSION['errorMessage'] = $passwordValidationResult;
    $_SESSION['formData'] = $_POST; 
    header("Location:../View/RegistrationPage.php");
    exit();
}
if ($password !== $confirmPassword) {
    $_SESSION['errorMessage'] = "Passwords do not match.";
    $_SESSION['formData'] = $_POST; 
    header("Location:../View/RegistrationPage.php");
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
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $_SESSION['registration_success'] = true;
        header("Location:../View/RegistrationPage.php");
    exit();
    }
    
}

function validateUsername($username) {
    $minLength = 3; 
    $maxLength = 20; 
    $obj = new User();
    $users=$obj->Listall();
    $usernames=[];
    for($i=0;$i<count($users);$i++){
        $usernames[$i]=$users[$i]->UserName;
    }
    if (strlen($username) < $minLength || strlen($username) > $maxLength) {
        return "Username must be between $minLength and $maxLength characters long.";
    }

    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        return "Username can only contain letters, numbers, and underscores.";
    }

    if (in_array($username, $usernames)) {
        return "Username already exists. Please choose a different one.";
    }

    return true;
}
function validatePassword($password) {
    $minLength = 4;
    $maxLength = 20;
    
    
    if (strlen($password) < $minLength) {
        return "Password must be at least $minLength characters long.";
    }

    if (strlen($password) > $maxLength) {
        return "Password cannot exceed $maxLength characters.";
    }

    if (!preg_match('/[0-9]/', $password)) {
        return "Password must contain at least one number.";
    }

    if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        return "Password must contain at least one special character.";
    }

    return true;
}

function validatePhoneNumber($phone) {
    $Length = 11;
    
    
    if (strlen($phone) < $Length) {
        return "Phone Number must be at least $Length characters long.";
    }

    if (strlen($phone) > $Length) {
        return "Phone Number cannot exceed $Length characters.";
    }

    
    return true;
}


?>





