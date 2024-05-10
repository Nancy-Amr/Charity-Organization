<?php

class GenerateDonationTypeForm {
     function generateDonationType() {
       echo'<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Type Insertion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
<h1>Please insert Donation Type:</h1>
    <form action="../Controllers/DonationTypeController.php?Command=Add" method="POST">
        <tr>
            Type:<input type="text" name="Type"></td>
            Description:<input type="text" name="Description"></td>
        </tr>
        <tr>
            <td colspan="5"><input type="submit" ></td>
        </tr>
    </form>
   
    
</table>
</body>
</html>';
     }
    }
     
    
    ?>
