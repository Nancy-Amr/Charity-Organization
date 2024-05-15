<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fawry Payment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Fawry Payment Form</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        // Check if the form is submitted
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Thank you message
                            echo '<div class="alert alert-success" role="alert">Thank you for your donation!</div>';
                            // Display message about sending code to phone number
                            echo '<div class="alert alert-info" role="alert">A code will be sent to your phone number.</div>';
                            // Go back button
                            echo '<a href="userApp.php" class="btn btn-primary btn-block">Go Back</a>';
                        } else {
                            // Display the payment form
                            echo '
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter phone number" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
