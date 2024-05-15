<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Enter Your Information</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="message">Reasons for Volunteering:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>


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
        echo "<div class='message-container'><p>Thank you! Your information has been submitted.</p>";
        echo "<a class='back-button' href='userApp.php'>Back to Home</a></div>";
    }
    ?>
</body>
</html>