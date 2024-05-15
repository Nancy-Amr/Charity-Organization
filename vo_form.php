<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>
<body>
    <h1>Enter Your Information</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="phone" id="phone" name="phone" required><br><br>

        <label for="age">Age:</label>
        <input type="age" id="age" name="age" required><br><br>
        
        <label for="message">Reasons for Volunteering:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $message = $_POST['message'];

        $image = isset($_GET['image']) ? $_GET['image'] : '';

        
        $file = fopen("userdata.txt", "a");

        
        fwrite($file, "Name: $name\n");
        fwrite($file, "Email: $email\n");
        fwrite($file, "Phone: $phone\n");
        fwrite($file, "Age: $age\n");
        fwrite($file, "Message: $message\n");
        fwrite($file, "Field: $image\n");
        fwrite($file, "-----------------\n");

        // Close the file
        fclose($file);

        echo "<p>Thank you! Your information has been submitted.</p>";
    }
    ?>
</body>
</html>
