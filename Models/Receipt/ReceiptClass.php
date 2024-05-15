<?php
class Receipt {
    private $details;

    public function __construct(array $details) {
        $this->details = $details;
    }

    public function getDescription(): string {
        return "Receipt: " . implode(", ", $this->details) . ".";
    }

    public function getDetails(): array {
        return $this->details;
    }
}
