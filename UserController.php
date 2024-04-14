<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User Details</title>
<style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;
  }
  </style>
</head>
  <body>
        <h1>User Details</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>UserName</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Email</td>
            </tr> 
        </div>
<?php
include_once"Function.php";
$obj=new User();
$user=$obj->getUserById($_GET["DonId"]);
echo "<td>".$user->Id."</td><td>".$user->UserName."</td><td>".$user->Phone."</td><td>".$user->Address."</td><td>".$user->Email."</td>";
?>
</table>
<button onclick="history.back()">Go Back</button>
</body>
</html>