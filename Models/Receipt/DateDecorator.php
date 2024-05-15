<?php
class DateDecorator extends ReceiptDecorator {
    private $additionalDate;

    public function __construct(ReceiptInterface $receipt, $additionalDate) {
        parent::__construct($receipt);
        $this->additionalDate = $additionalDate;
    }

    public function displayReceipt($donationDetails) {
        // Add additional date to the receipt
        $receiptContent = parent::displayReceipt($donationDetails);
        $receiptContent .= "Additional Date: {$this->additionalDate}\n";
        
        return $receiptContent;
    }
}