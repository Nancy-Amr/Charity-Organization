<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes Donation Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Clothes Donation Form</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="clothing_type">Clothing Type</label>
                                <select class="form-control" name="clothing_type" id="clothing_type" required>
                                    <option value="shirt">Shirt</option>
                                    <option value="pants">Pants</option>
                                    <option value="dress">Dress</option>
                                    <option value="jacket">Jacket</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" required>
                            </div>
                            <!-- Add more form fields for additional information -->
                            <button type="submit" class="btn btn-primary btn-block">Donate Clothes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the clothing type and quantity are provided
    if (isset($_POST["clothing_type"]) && isset($_POST["quantity"])) {
        $clothing_type = $_POST["clothing_type"];
        $quantity = $_POST["quantity"];
        
        // Process the clothes donation based on the provided information
        // You can add your processing logic here
        
        // Redirect or display a thank you message
        echo "Thank you for your clothes donation!";
        exit();
    } else {
        // Handle if clothing type or quantity is not provided
        echo "Please provide both clothing type and quantity!";
        exit();
    }
}
?>
