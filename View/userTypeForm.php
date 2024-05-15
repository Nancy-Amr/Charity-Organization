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
<form action="../Controllers/UserTypeController.php?Command=Add" method="POST">

 
  <tr>
    <td>Type:</td>
    <td><input type="text" name="type"></td>
  </tr>

  <!-- <input type="hidden" name="id" value="default_id">   -->

  <tr>
    <td colspan="2"><input type="submit" ></td>
  </tr>
</form>


</table>
</body>
</html>
