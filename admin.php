<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <style>
    /* Center the h2 element */
    h2 {
      text-align: center;
      padding-top: 200px;
    }
  </style>
</head>



<h2 ><?php

if (isset($_GET['Username'])) {
  $userName = $_GET['Username'];
  echo "Welcome, $userName!";
}

?></h2>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <style>
    /* Basic styling for a visually appealing button */
    button {
      background-color: #4CAF50; /* Green background */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px; /* Add rounded corners */
    }

    button:hover {
      background-color: #45A049; /* Darker green on hover */
    }
    .button-container {
           display: flex; 
           justify-content: center;
         }

    /* Optional styling for a more refined look */
    body {
      font-family: Arial, sans-serif; /* Set a pleasant font */
      margin: 20px; /* Add some margin for better spacing */
      background-color: #F0E6D2;
    }

    .welcome-message {
      font-weight: bold; /* Emphasize the welcome message */
      margin-bottom: 10px; /* Add some space below the welcome message */
    }
  </style>
</head>
<body>

<div class="button-container">
<button  onclick="window.location.href='View/user.php'" >User Management</button>
  </div>
</body>
</html>

