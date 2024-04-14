<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Charity Organization</title>
    <meta  name ="description" content = "">
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
        <h1>List of all donations</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>Date</td>
            </tr> 
        </div>

      
<?php
include_once"Function.php";
$obj=new Donation();
$arr=[];
$arr=$obj->ListallDonations();
for($i=0;$i<count($arr);$i++){
    echo"<tr><td><a href=DonationDetailsController.php?Id=".$arr[$i]->Id.">".$arr[$i]->Id."</a></td><td>".$arr[$i]->date."</td>";
    if (isset($arr[$i]->Id) && !empty($arr[$i]->Id)) {
        echo "<td><a href='EditDonationForm.php?action=edit&id={$arr[$i]->Id}'>Edit</a></td>";
        echo "<td><a href='DeleteDonationForm.php?action=delete&id={$arr[$i]->Id}'>Delete</a></td>";
    }
    echo "</tr>";
}
//"</td><td>".$arr[$i]->recipient."</td><td><a href=UserController.php?DonId=".$arr[$i]->Id.">".$arr[$i]->DonorId."</a>"</td><td>".$arr[$i]->feedback."</td></tr>";
?>

</table>
<button onclick="location.href='AddDonationForm.php';">Insert New Donation</button><br>
<button onclick="location.href='DonationDetails.php';">View All Donations details</button><br>
<button onclick="location.href='user.php';">View Users</button>
</body>
</html>
