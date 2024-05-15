<?php
class ValidateRegistration
{
    function getById($Id){
        include_once"Function.php";
        $obj= new Main();
        $x=$obj->getLineWithId($Id,"user.txt","~");
        $ArrayLine = explode("~", $x);
        $User=$ArrayLine[1];
        return $User;
    } 
    function Listall(){
        $arr=[];
        $i=0;
        $file = fopen("user.txt", "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        if (!empty(trim($line))) {
        $ArrayLine = explode("~", $line);
       $arr[$i]=$this->getbyID($ArrayLine[0]);
       $i++;
            }
        }
        return $arr;
    }
    function validateUsername($username) {
        $minLength = 3; 
        $maxLength = 20; 
        
        $users=$this->Listall();
        $usernames=[];
        for($i=0;$i<count($users);$i++){
            $usernames[$i]=$users[$i];
        }
        if (strlen($username) < $minLength || strlen($username) > $maxLength) {
            return "Username must be between $minLength and $maxLength characters long.";
        }
    
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            return "Username can only contain letters, numbers, and underscores.";
        }
    
        if (in_array($username, $usernames)) {
            return "Username already exists. Please choose a different one.";
        }
    
        return true;
    }
    function validatePassword($password) {
        $minLength = 4;
        $maxLength = 20;
        
        
        if (strlen($password) < $minLength) {
            return "Password must be at least $minLength characters long.";
        }
    
        if (strlen($password) > $maxLength) {
            return "Password cannot exceed $maxLength characters.";
        }
    
        if (!preg_match('/[0-9]/', $password)) {
            return "Password must contain at least one number.";
        }
    
        if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
            return "Password must contain at least one special character.";
        }
    
        return true;
    }
    
    function validatePhoneNumber($phone) {
        $Length = 11;
        
        
        if (strlen($phone) < $Length) {
            return "Phone Number must be at least $Length characters long.";
        }
    
        if (strlen($phone) > $Length) {
            return "Phone Number cannot exceed $Length characters.";
        }
    
        
        return true;
    }

    
}

?>