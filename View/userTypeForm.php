<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Type Info Insertion</title>
    <meta name="description" content="my first trial">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
<h1>Please insert your info:</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <!-- <tr>
      <td>ID:</td>
      <td><input type="text" name="ID"></td>
    </tr> -->

  <tr>
    <td>Type:</td>
    <td><input type="text" name="type"></td>
  </tr>

  <!-- <input type="hidden" name="id" value="default_id">   -->

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
