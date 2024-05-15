<?php
class DetailsDecorator extends ReceiptDecorator {
    private $additionalDetails;

    public function __construct(ReceiptInterface $receipt, $additionalDetails) {
        parent::__construct($receipt);
        $this->additionalDetails = $additionalDetails;
    }

    public function displayReceipt($donationDetails) {
        // Add additional details to the receipt
        $receiptContent = parent::displayReceipt($donationDetails);
        $receiptContent .= "Additional Details: {$this->additionalDetails}\n";
        
        return $receiptContent;
    }
}