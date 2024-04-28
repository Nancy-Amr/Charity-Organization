
<?php
class UserView{
  function showUser($user){
    echo "<h1>User Details</h1>";
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
echo"<table>
<tr>
<th>Id</th>
<th>UserName</th>
<th>Phone</th>
<th>Address</th>
<th>Email</th>
</tr>
</div>";
echo "<tr><td>".$user->Id."</td><td>".$user->UserName."</td><td>".$user->Phone."</td><td>".$user->Address."</td><td>".$user->Email."</td></tr></table>";
echo '<br><br><button onclick="history.back()">Go Back</button>';

  }
}
?>
