<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Charity Organization</title>
    <meta  name ="description" content = "my first trial">
    <meta  name ="viewport" content ="width= device-width, initial scale=1">
    <script src="" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href='../main.css'/>
    <link rel="stylesheet" type="text/css" media="screen" href='../table.css'/>
    <script src='main.js'></script>
    <style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;
         margin-bottom: 40px;
         
  }
              button {
                /* Adjust these properties as desired */
                padding: 10px 20px; /* Adjust padding for button size */
                border: 1px solid #45A049; /* Border color */
                border-radius: 5px; /* Rounded corners */
                font-size: 16px; /* Font size for button text */
                cursor: pointer; /* Change cursor to pointer on hover */
                margin-left: 20px;
              }
              
              /* Optional: Hover effect for all buttons */
              button:hover {
                background-color: #45A049; /* Background color on hover */
              }
              .button-container {
                display: flex; /* Enable flexbox for the container */
                justify-content: center; /* Center buttons horizontally */
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
include_once "../Models/User/UserClass.php";

$obj = new User();
$obj->DrawTableFromFile();
?>

</table>
<div class="button-container">
<button onclick="location.href='../Controllers/UserController.php?Command=Add';">Insert New User</button>
<button onclick="location.href='userT.php';">View User types</button>
<button onclick="location.href='Donation.php';">View Donations</button>
<button onclick="location.href='DonationType.php';">View Donation Types</button>
<button onclick="location.href='VolunteeringOppurtunity.php';">View Volunteering Oppurtunities</button>
</div>
</body>
</html>
