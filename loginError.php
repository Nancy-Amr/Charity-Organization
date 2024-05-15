<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="main.css">


    <title>Error</title>
</head>
<body>
    <h1>Error</h1>
   <p> <?php echo isset($_GET['message']) ? $_GET['message'] : 'An error occurred.'; ?><br><br> </p>
   <div class="button-container">
    <button onclick="location.href='index.php';">Return to Login Page</button>
</div>

</body>
</html>