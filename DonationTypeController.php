<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Donation Type</title>
<style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;
  }
  </style>
</head>
  <body>
        <h1>Donation Type</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>Type</td>
                    <td>Description</td>
            </tr> 
        </div>
<?php
include_once"Function.php";
$obj=new DonationType();
$DonType=$obj->getDonationTypeById($_GET["DonId"]);
echo "<td>".$DonType->Id."</td><td>".$DonType->type."</td><td>".$DonType->Description."</td>";
?>
</table>
<button onclick="history.back()">Go Back</button>
</body>
</html>