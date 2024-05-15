<?php

interface PaymentProcessor {
  public function collectPaymentDetails(): array;
  public function processPayment(array $paymentDetails): bool;

}

?>