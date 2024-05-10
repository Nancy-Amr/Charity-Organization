<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Charity Organization</title>
    <meta  name ="description" content = "">
    <meta  name ="viewport" content ="width= device-width, initial scale=1">
    <script src="" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href='../main.css'/>
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
        <h1>List of all oppurtunities</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>title</td>
                    <td>volunteer</td>
                    <td>location</td>
                    <td>Date</td>
                    <td>Edit</td>
                    <td>Delete</td>
                   

                   

            </tr> 
        </div>

      
<?php

include_once"../Models/VolunteeringOpp/VolunteeringOppClass.php";
$obj=new VolunteeringOppurtunity();
$arr=[];
$arr=$obj->ListalloppDetails();
for($i=0;$i<count($arr);$i++){
    echo"<tr><td>".$arr[$i]->Id."</td><td>".$arr[$i]->title."</td><td>".$arr[$i]->volunteer."</td><td>".$arr[$i]->location."</td><td>".$arr[$i]->date."</td>";

    if (isset($arr[$i]->Id) && !empty($arr[$i]->Id)) {
        echo "<td><a href='EditOppForm.php?action=edit&id={$arr[$i]->Id}'>Edit</a></td>";
        echo "<td><a href='DeleteOppForm.php?action=delete&id={$arr[$i]->Id}'>Delete</a></td>";
    }
    echo "</tr>";
}
//"</td><td>".$arr[$i]->recipient."</td><td><a href=UserController.php?DonId=".$arr[$i]->Id.">".$arr[$i]->DonorId."</a>"</td><td>".$arr[$i]->feedback."</td></tr>";
?>

</table>
<div class="button-container">
<button onclick="location.href='AddOppForm.php';">Insert New Oppertunity</button>
<button onclick="location.href='Donation.php';">View Donations</button>
<button onclick="location.href='user.php';">View Users</button>
</div>
</body>
</html>
