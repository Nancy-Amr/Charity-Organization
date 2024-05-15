<?php
abstract class ReceiptDecorator implements ReceiptInterface {
    protected $receipt;

    public function __construct(ReceiptInterface $receipt) {
        $this->receipt = $receipt;
    }

    public function displayReceipt($donationDetails) {
        return $this->receipt->displayReceipt($donationDetails);
    }
}