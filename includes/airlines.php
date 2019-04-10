<?php
include "airline.php";

 Class Airlines{
    public $airlinesArray = array();
    public $test = "LPM";

    public function SetAirlines($airlinesList){
        foreach ($airlinesList as $airline) {
            $newAirline = new Airline($airline["id"], $airline["name"],$airline["display_name"],$airline["code"]);
            array_push($this->airlinesArray,$newAirline);
        }
    }

}

?>