<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Type Info Insertion</title>
    <meta name="description" content="my first trial">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>

</head>
<body>
<h1>Please insert your info:</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <tr>
            Type:<input type="text" name="type"></td><br>
            <input type="hidden" name="id" value="<?php  echo $_GET['Id']; ?>">
            <?php
            if($_GET){
                echo "ID:  ". $_GET['Id']; 
            }else{
              echo "Url has no id";
            }
            ?></td><br>
                       <!-- ID:<input type="text" name="id"></td><br> -->

        </tr>
        <tr>
            <td colspan="2"><input type="submit" ></td>
        </tr>
    </form>
   
    <?php
include_once"../Models/UserType/UserTypeClass.php";
$obj = new UserType();
$obj->InsertType();
?>
</table>
</body>
</html>