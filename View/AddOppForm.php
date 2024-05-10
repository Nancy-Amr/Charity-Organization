<!DOCTYPE html>
<html lang="en">
<head>
    <title>Oppurtunity Info Insertion</title>
    <meta name="description" content="Oppurtunity insertion">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    


</head>
<body>
<h1>Please insert Oppurtunity info:</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr>
                <td>Id:</td>
                <td><input type="text" name="Id"></td>
            </tr>
            <tr>
                <td>title:</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>volunteer:</td>
                <td><input type="text" name="volunteer"></td>
            </tr>
            <tr>
                <td>location:</td>
                <td><input type="text" name="location"></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="text" name="date"></td>
            </tr>
           
            </tr>
            <tr>
                <td colspan="2"><input type="submit"></td>
            </tr>
        </table>
    </form>
   
    <?php
include_once"../Models/VolunteeringOpp/VolunteeringOppClass.php";
$obj = new VolunteeringOppurtunity();
$obj->InsertOpp();
       
?>
</table>
</body>
</html>
