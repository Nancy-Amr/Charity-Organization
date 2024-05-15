<?php
include_once "../Models/User/UserClass.php";
class GenerateUserForm {
     function generateUserForm() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include_once"../Models/UserType/UserTypeClass.php";
        $type=new UserType();
        $types=$type->Listall();
        $formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : array();
        $errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : "";
        unset($_SESSION['formData']);
        unset($_SESSION['errorMessage']);
       echo
        '<!DOCTYPE html>
        <html lang="en">
        <head>
            <title>User Info Insertion</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="../style.css">
            
        </head>
        <body>
            <h1>Please insert your info:</h1>
            <form action="../Controllers/UserController.php?Command=Add" method="POST">
                <table>
                <tr>
                <td>Username:<input type="text" name="Username" value="' . (isset($formData['Username']) ? $formData['Username'] : '') . '"></td>
            </tr>
            <tr>
                <td>Address:<input type="text" name="Address" value="' . (isset($formData['Address']) ? $formData['Address'] : '') . '"></td>
            </tr>
            <tr>
                <td>Phone:<input type="text" name="Phone" value="' . (isset($formData['Phone']) ? $formData['Phone'] : '') . '"></td>
            </tr>
            <tr>
                <td>Email:<input type="email" name="Email" value="' . (isset($formData['Email']) ? $formData['Email'] : '') . '"></td>
            </tr>
            <tr>
                <td>Password:<input type="password" name="Password" value="' . (isset($formData['Password']) ? $formData['Password'] : '') . '"></td>
            </tr>
            <tr>
                <td>Confirm Password:<input type="password" name="ConfirmPassword" value="' . (isset($formData['ConfirmPassword']) ? $formData['ConfirmPassword'] : '') . '" ></td>
            </tr>
            <tr>

                    <td>User Type:
                   <select name="UserType">';
                        foreach ($types as $userType) {
                            echo "<option value='" . $userType->id . "'>" . $userType->type . "</option>";
                        }
                    
                  echo'</select>
                  </td>
                  </tr>
                    <tr>
                        <td colspan="5"><input type="submit" ></td>
                    </tr>
                </table>
            </form>';
            if (!empty($errorMessage)) {
                echo '<p>' . $errorMessage . '</p>';
            }
       echo' </body>
        </html>
        ';
       
       
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



}

?>