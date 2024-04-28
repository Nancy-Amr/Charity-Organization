<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Charity Organization</title>
    <meta  name ="description" content = "my first trial">
    <meta  name ="viewport" content ="width= device-width, initial scale=1">
    <script src="" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href='main.css'/>
    <script src='main.js'></script>
    <style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;
  }
  </style>
    </style>
  </head>
  <body>
        <h1>List of all users</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>User Name</td>
                    <td>Phone</td>
                    <td>Adrees</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>Type</td>
                    <td>Edit</td>
                    <td>Delete</td>
            </tr> 
        </div>

      
<?php
include_once"Function.php";
$obj = new User();
$obj->DrawTableFromFile();
?>

</table>
<button onclick="location.href='UserController.php?Command=Add';">Insert New User</button>
<button onclick="location.href='userT.php';">View User types</button>
<br><button onclick="location.href='Donation.php';">View Donations</button>
<button onclick="location.href='DonationType.php';">View Donation Types</button><br>
<button onclick="location.href='VolunteeringOppurtunity.php';">View Volunteering Oppurtunities</button>

</body>
</html>
