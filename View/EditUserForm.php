<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    
</head>
<body>
    <h2>Edit User Information</h2>
    <?php
    include_once "../Models/UserType/UserTypeClass.php";
    include_once "../Models/User/UserClass.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : array();
    $errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : "";
    unset($_SESSION['formData']);
    unset($_SESSION['errorMessage']);
    $obj=new User();
    $userT=new UserType();
    $types=$userT->Listall();
    // Check if form is submitted
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     // Call function to handle user edit
    //    $obj-> handleUserEdit();
        
    //     // Redirect to user page after editing
    //     header("Location:user.php");
    //     exit();
    // } 
    // else {
        // Retrieve user data if ID is provided
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $userId = $_GET['id'];
            $filename = $obj->mainobj->filename;
            $file = fopen($filename, "r") or die("Unable to open file!");

            // Iterate through each line in the file
            while (!feof($file)) {
                $line = fgets($file);
                $userData = explode($obj->mainobj->separator, $line);

                if (!empty($userData) && $userData[0] == $userId) {
                    list($id, $username, $phone, $address, $email,$password,$userTypeId) = $userData;
                    // $type=$userT->gettypebyID($userData[0]);
    ?>             
                    <form action="../Controllers/UserController.php?Command=Edit" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        Username: <input type="text" name="Username" value="<?php echo $username; ?>"><br>
                        Phone: <input type="text" name="Phone" value="<?php echo $phone; ?>"><br>
                        Address: <input type="text" name="Address" value="<?php echo $address; ?>"><br>
                        Email: <input type="text" name="Email" value="<?php echo $email; ?>"><br>
                        Password: <input type="password" name="Password" value="<?php echo $password; ?>"><br>
                        Confirm Password: <input type="password" name="ConfirmPassword" value="<?php echo $password; ?>"><br>
                        User Type:
                        <select name="UserType">
                            <?php
                            foreach ($types as $userType) {
                                $selected = ($userType->id == $userTypeId) ? 'selected' : '';
                                echo "<option value='" . $userType->id . "' $selected>" . $userType->type . "</option>";
                            }
                            ?>
                        <input type="submit" name="edit" value="Save Changes">
                    </form>
    <?php
    if (!empty($errorMessage)) {
        echo '<p>' . $errorMessage . '</p>';
    }
                    break;
                }
            }
            fclose($file);
        } else {
            echo "User ID not provided.";
        }
    //}
    ?>
</body>
</html>
