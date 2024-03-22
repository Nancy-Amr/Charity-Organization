<!DOCTYPE html>
<html lang="en">
<head>
    <title>Charity Organization</title>
    <meta name="description" content="my first trial">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>

</head>
<body>
<h1>Please insert your info:</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <tr>
            Username:<input type="text" name="Username"></td>
            Address:<input type="text" name="Address"></td>
            Phone:<input type="text" name="Phone"></td>
            Email:<input type="text" name="Email"></td>
        </tr>
        <tr>
            <td colspan="5"><input type="submit" ></td>
        </tr>
    </form>
   
    <?php
include_once"Function.php";
InsertUser();
?>
</table>
</body>
</html>
