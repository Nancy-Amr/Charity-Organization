<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Donation Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Money Donation Form</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter donation amount" required>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Payment Method</label>
                                <select class="form-control" name="payment_method" id="payment_method">
                                    <option value="visa">Visa</option>
                                    <option value="fawry">Fawry</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Next</button>
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
    // Check if the amount and payment method are provided
    if (isset($_POST["amount"]) && isset($_POST["payment_method"])) {
        $amount = $_POST["amount"];
        $payment_method = $_POST["payment_method"];
        
        // Redirect based on the selected payment method
        if ($payment_method === "visa") {
            header("Location: visapayment.php");
            exit();
        } elseif ($payment_method === "fawry") {
            header("Location: fawry.php");
            exit();
        } else {
            // Handle invalid payment method
            echo "Invalid payment method!";
            exit();
        }
    } else {
        // Handle if amount or payment method is not provided
        echo "Please provide both amount and payment method!";
        exit();
    }
}
?>
