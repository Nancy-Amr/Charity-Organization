<?php

require "iDonateTyoe.php";

class clothesD implements iDonateTye  {

    public function processDonation(array $data): bool {
        if (!isset($data['address']) || empty($data['address'])) {
          throw new Exception("Missing address for clothes pickup.");
        }
    
       
        $quantity = isset($data['quantity']) ? $data['quantity'] : 1;
        $clothingTypes = isset($data['clothingTypes']) ? $data['clothingTypes'] : [];
    
        
        $success = storeClothesDonationDetails($data['address'], $quantity, $clothingTypes);
    
       
        if ($success) {
          echo "Thank you for your clothes donation! We will arrange a pickup at your address.";
          return true;
        } else {
          echo "There was an error processing your clothes donation. Please try again later.";
          return false;
        }
      }
    }
    
    function storeClothesDonationDetails(string $address, int $quantity, array $clothingTypes): bool {
       
        $filename = "clothes_donations.txt"; 
        $file = fopen($filename, "a+") or die("Unable to open file!");
      
       
        $data = [
          "timestamp" => date("Y-m-d H:i:s"), 
          "address" => $address,
          "quantity" => $quantity,
          "clothingTypes" => implode(", ", $clothingTypes), 
        ];
        $formattedData = json_encode($data) . PHP_EOL; 
       
        fwrite($file, $formattedData);
      
        
        fclose($file);
      
        return true; 
      }
  
?>