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
        <h1>List of all user types</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>User type</td>
                    <td>Edit</td>
                    <td>Delete</td>
                    
            </tr> 
        </div>

      
<?php
// include_once "Function.php";
// DrawTableFromFile("userT.txt");


include_once"Function.php";
$obj=new UserType();
$arr=[];
$arr=$obj->ListallUtypes();
for($i=0;$i<count($arr);$i++){
    echo"<tr><td><a href=DonationDetailsContr.php?Id=".$arr[$i]->id.">".$arr[$i]->id."</a></td><td>".$arr[$i]->type."</td>";
    if (isset($arr[$i]->id) && !empty($arr[$i]->id)) {
        echo "<td><a href='EditDonationForm.php?action=edit&id={$arr[$i]->id}'>Edit</a></td>";
        echo "<td><a href='DeleteTypeForm.php?action=delete&id={$arr[$i]->id}'>Delete</a></td>";
    }
    echo "</tr>";
}
?>

</table>
<button onclick="location.href='UserTypeForm.php';">Insert New User Type</button>
</body>
</html>
