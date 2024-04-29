<?php


class Main{
    public $filename;
    public $separator;
    function getLineWithId($Id,$filename,$separator){
        if(!file_exists($filename)){return 0;}
        $file = fopen($filename, "r+") or die("Unable to open file!");
        while (!feof($file)) {
            $line = fgets($file);
            $ArrayLine = explode($separator, $line);
            if ($ArrayLine[0]==$Id) {
                fclose($file);
                return $line;
            }
        }
        fclose($file);
        return false;
    }
    function getLastId($filename,$separator){
        if(!file_exists($filename)){return 0;}
        $file = fopen($filename, "r+") or die("Unable to open file!");
        $lastId = 0;
        while (!feof($file)) {
            $line = fgets($file);
            $Info = explode($separator, $line);
            if ($Info[0]!="") {
                $lastId = (int)$Info[0];
            }
        }
        fclose($file);
        return $lastId;
    }
}


    





?>
