
<?php
class UserTypeView{
  function showUserType($user){
echo"<style>
table{
  border-collapse: collapse;
  width: 70%; 
  background-color: #f2f2f2; /
   border: 1px solid black;
   padding: 5px;
  }
  th, td {
      border: 1px solid black;
      padding: 8px;
    }
  
    th {
      background-color: #e9e9e9; 
    }
  
</style>";
echo "<h1>User Details</h1>
<table>
    <tr>
            <td>Id</td>
            <td>UserName</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Email</td>
    </tr> 
</div>";
echo "<tr><td>".$user->Id."</td><td>".$user->UserName."</td><td>".$user->Phone."</td><td>".$user->Address."</td><td>".$user->Email."</td></tr></table>";
echo '<button onclick="history.back()">Go Back</button>';

  }
}
?>
