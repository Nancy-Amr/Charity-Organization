<!DOCTYPE html>
<html lang="en">
<head>
    <title>Charity Organization</title>
    <meta name="description" content="my first trial">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>

</head>
<body>
<h1>Please insert donation info:</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <tr>
            DonorId:<input type="text" name="DonorId"></td>
            Date:<input type="text" name="Date"></td>
            RecipientId:<input type="text" name="RecipientId"></td>
            Feedback (if you would like to provide one!):<input type="text" name="Feedback"></td>
        </tr>
        <tr>
            <td colspan="5"><input type="submit" ></td>
        </tr>
    </form>
   
    <?php
include_once"Function.php";
$obj = new DonationDetails();
$obj->InsertDonation();
       
?>
</table>
</body>
</html>
