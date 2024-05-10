<?php

class GenerateUserForm {
     function generateUserForm() {
        include_once"../Models/UserType/UserTypeClass.php";
        $type=new UserType();
        $types=$type->ListallUtypes();
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
            <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                <table>
                    <tr>
                        <td>Username:<input type="text" name="Username"></td>
                    </tr>
                    <tr>
                        <td>Address:<input type="text" name="Address"></td>
                    </tr>
                    <tr>
                        <td>Phone:<input type="text" name="Phone"></td>
                    </tr>
                    <tr>
                        <td>Email:<input type="text" name="Email"></td>
                    </tr>
                    <tr>
                        <td>Password:<input type="text" name="Password"></td>
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
            </form>
        </body>
        </html>
        ';
        
    }
}

include_once "../Models/User/UserClass.php";

$obj = new User();
$obj->InsertUser();

?>



