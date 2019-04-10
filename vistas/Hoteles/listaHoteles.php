<?php

include_once "../../includes/Hotel.php";
include_once "../../includes/apiCall.php";

if(isset($_GET['guests']) && isset($_GET['checkin']) && $_GET['checkout'] && $_GET['destination']){

    $make_call = CallAPI("Get", "https://beta.id90travel.com/api/v1/hotels.json?guests[]=".$_GET['guests']."&checkin=".$_GET['checkin']."&checkout=".$_GET['checkout']."&destination=".$_GET['destination'],false);
    $response = json_decode($make_call, true);

    if(is_null($response)){
        echo "<div class=\"regular-padding\"> <h3> There was a problem with the request. Please check the fields.</h3> </div>";
    }
    else {
        if (array_key_exists('hotels', $response)) {

            if(sizeof($response['hotels']) == 0){
                echo "<div class=\"regular-padding\"> <h3> We are sorry. There are no hotels for your destination.</h3> </div>";
            }else{


                $listaHoteles = array();
                foreach ($response['hotels'] as $hotel) {
                    //($name,$star_rating,$review_rating,$accommodation_type,$description) {
                    $newHotel = new Hotel($hotel["id"], $hotel["name"], $hotel["star_rating"], $hotel["review_rating"], $hotel["accommodation_type"]["type"], $hotel["location_description"]);
                    array_push($listaHoteles, $newHotel);

                }


                foreach ($listaHoteles as $hotel) {
                    echo "<div class=\"panel hotel-card\">
                    <div class=\"panel-body\" >
                        <div  class=\"display-flex-between\">
                            <div class=\"hotel-title\">
                                " . $hotel->name . "
                            </div>
                            <div class=\"hotel-type\">" . $hotel->accommodation_type . "</div>
                        </div>
                        <div  class=\"display-flex-between\">
                            <div class=\"hotel-desc\">
                                " . $hotel->location_description . "
                            </div>
                            <div class=\"hotel-rating\">" . $hotel->review_rating . "/10 rating</div>
                        </div>

                    </div>
                </div>";

                }
            }

        }
        if (array_key_exists('error', $response)) {
            $error = $response['error'];

            echo "<div class=\"regular-padding\"> <h3> Error: " . $error . "</h3> </div>";
        }
        if (array_key_exists('status', $response)) {

            $status = $response['status'];

            echo "<div class=\"regular-padding\"> <h3> Status: " . $status . "</h3> </div>";
        }
    }
}