<?php

class cash implements PaymentProcessor{
    public function collectPaymentDetails(): array {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return [
              'address' => isset($_POST['address']) ? trim($_POST['address']) : null,
              'suitableTime' => isset($_POST['suitableTime']) ? trim($_POST['suitableTime']) : null,
            ];
          } else {
            return [];
      }
    }
      public function processPayment(array $paymentDetails): bool {
        echo "Cash payment received. Processing...";
        return true;
      }
}
?>