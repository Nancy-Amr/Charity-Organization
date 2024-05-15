<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Choose Donation Type</h2>
                    </div>
                    <div class="card-body">
                        <form id="donationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="donation_type">Donation Type</label>
                                <select class="form-control" name="donation_type" id="donation_type">
                                    <option value="money">Money</option>
                                    <option value="clothes">Clothes</option>
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

    <script>
        // Function to submit the form with the selected donation type
        document.getElementById("donationForm").addEventListener("submit", function(event) {
            var donationType = document.getElementById("donation_type").value;
            // Add the selected donation type as a hidden input field
            var hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", "donation_type");
            hiddenInput.setAttribute("value", donationType);
            this.appendChild(hiddenInput);
        });
    </script>
</body>
</html>

<?php
// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["donation_type"])) {
        $donation_type = $_POST["donation_type"];
        
        // Redirect based on the donation type
        if ($donation_type === "money") {
            // Redirect to money donation page
            header("Location: moneydonation.php");
            exit();
        } elseif ($donation_type === "clothes") {
            // Redirect to clothes donation page
            header("Location: clothesdonation.php");
            exit();
        } else {
            // Handle invalid donation type
            echo "Invalid donation type!";
            exit();
        }
    } else {
        // Handle if donation type is not selected
        echo "Please select a donation type!";
        exit();
    }
}
?>
