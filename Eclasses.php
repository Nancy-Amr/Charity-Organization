<?php

include_once"Models/Donation/DonationClass.php";


class StaffMember{
public $E_ID;
public $position;
public $salary;

}

class Manager extends StaffMember{
    public $report = [] ;

    public function writeReport()  {}

    
}
class DonationRequest{
    
}

class Fundraiser extends StaffMember{
    public function reviewDonationRequests(DonationRequest $d) {}
    public function updateRequestStatus(DonationRequest $d){}

}

class FinancialManager extends StaffMember{
    public  $funds = [] ;
    public $Categories = [];

    public function viewBalance(){}
    public function AllocateFunds(){}


}

class GeneralManager extends StaffMember{
    public function viewFeedBack(){}
    public function viewReports(){}


}

class Receptionist extends StaffMember{
   public $donation = [];
   public function addDonation(Donation $donation) {
    $this->donation[] = $donation;
}

}
class ClothesManager extends Manager{
    public $donation = [];
    public function reviewDonation(){}

 
 }
 class FoodManager extends Manager{
    public $products = [];
    public function reviewDonationitemExpiry(){}
    public function manageFoodInventory(){}
    
 
 }
 class MarketingManager extends Manager{
    
    public function retrieveEventsDetails(){}
    public function editwebsiteContent(){}
    public function notifyVol_Don(){}
    public function EmailSponsors(){}
    public function AdvertiseEvent(){}
    
 
 }


  class Event {
    public $name;
    public $date;
    public $location;
    public $Descripttion;
    public $contributors =[];
    public $sponsors =[];
    public function displayEevnt(){}

  }

  class Sponsor{

    public $company;
    public $PhoneNo;
    public $Name;
    public $Email;
    public $Events =[];
    public function Displayevents(Event $e){}


  }





?>
