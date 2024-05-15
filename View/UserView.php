
<?php
class UserView{
  function showUser($user){
    echo "<h1>User Details</h1>";
    echo '<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>';

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
