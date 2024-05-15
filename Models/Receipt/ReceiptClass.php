<?php
class Receipt implements ReceiptInterface {
    private $template;
    private $details;
    private $date;

    public function __construct($template, $details, $date) {
        $this->template = $template;
        $this->details = $details;
        $this->date = $date;
    }

    public function displayReceipt($donationDetails) {
        // Generate the receipt content based on the provided details
        $receiptContent = "Receipt Details:\n";
        $receiptContent .= "Template: {$this->template}\n";
        $receiptContent .= "Details: {$this->details}\n";
        $receiptContent .= "Date: {$this->date}\n";
        $receiptContent .= "Donation Details:\n";
        $receiptContent .= $donationDetails;
        
        return $receiptContent;
    }
}

