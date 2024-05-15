<?php


class CreditCardPaymentProcessor implements PaymentProcessor {

private $paymentProcessor; 

public function __construct(PaymentProcessor $paymentProcessor) {
  
  $this->paymentProcessor = $paymentProcessor;
}

public function collectPaymentDetails(): array {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    return [
      'cardholderName' => isset($_POST['cardholderName']) ? trim($_POST['cardholderName']) : null,
      'cardNumber' => isset($_POST['cardNumber']) ? trim($_POST['cardNumber']) : null,
      'expiryMonth' => isset($_POST['expiryMonth']) ? trim($_POST['expiryMonth']) : null,
      'expiryYear' => isset($_POST['expiryYear']) ? trim($_POST['expiryYear']) : null,
      'amount' => isset($_POST['amount']) ? trim($_POST['amount']) : null, 
    ];
  } else {
    return [];
  }
}

public function processPayment(array $paymentDetails): bool {
  if (empty($paymentDetails['cardholderName']) ||
      empty($paymentDetails['cardNumber']) ||
      empty($paymentDetails['expiryMonth']) ||
      empty($paymentDetails['expiryYear']) ||
      empty($paymentDetails['amount'])) {
    throw new Exception("Missing required payment details.");
  }
  return $this->paymentProcessor->processPayment($paymentDetails);  
}

}
?>