<?php


class Hotel
{
    public $id;
    public $name;
    public $star_rating;
    public $review_rating;
    public $accommodation_type;
    public $location_description;


    function __construct($id,$name,$star_rating,$review_rating,$accommodation_type,$location_description) {

        $this->id = $id;
        $this->name = $name;
        $this->star_rating = $star_rating;
        $this->review_rating = $review_rating;
        $this->accommodation_type = $accommodation_type;
        $this->location_description = $location_description;
        }
}