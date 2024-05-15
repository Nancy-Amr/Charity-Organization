<?php

class MoneyDonation implements iDonateTye {

    private $paymentProcessor;
  
    public function __construct(PaymentProcessor $paymentProcessor) {
      $this->paymentProcessor = $paymentProcessor;
    }
  
    public function processDonation(array $data): bool {
      if (!isset($data['amount']) || !is_numeric($data['amount']) || $data['amount'] <= 0) {
        throw new Exception("Invalid donation amount.");
      }
      $paymentDetails = $this->paymentProcessor->collectPaymentDetails(); 
  
      return $this->paymentProcessor->processPayment($paymentDetails);
    }
  }
  
?>