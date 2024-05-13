<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Charity Organization</title>
    <meta  name ="description" content = "my first trial">
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


include_once"../Models/UserType/UserTypeClass.php";
$obj=new UserType();
$arr=[];
$arr=$obj->ListallUtypes();
for($i=0;$i<count($arr);$i++){
  //echo"<tr><td>".$arr[$i]->id."</a></td><td>".$arr[$i]->type."</td>";
  echo "<tr><td>" . ($arr[$i]->id ?? '') . "</td><td>" . ($arr[$i]->type ?? '') . "</td>";

  if (isset($arr[$i]->id) && !empty($arr[$i]->id)) {
      //echo "<td><a href='EditTypeForm.php?action=edit&id={$arr[$i]->id}'>Edit</a></td>";
      echo "<td><a href='EditTypeForm.php?action=edit&id={$arr[$i]->id}'>Edit</a></td>";
      echo "<td><a href=\"../Controllers/UserTypeController.php?Command=Delete&id={$arr[$i]->id}\">Delete</a></td>";
  }
  echo "</tr>";
}
?>

</table>
<div class="button-container">
<button onclick="location.href='UserTypeForm.php';">Insert New User Type</button>
<button onclick="location.href='user.php';">View Users</button>
</div>
</body>
</html>
