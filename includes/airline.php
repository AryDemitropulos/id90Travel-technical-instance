<?php
 Class Airline{
    public $id;
    public $name;
    public $display_name;
    public $code;

    function __construct($id, $name,$display_name,$code) {
        $this->id = $id;
        $this->name = $name;
        $this->display_name = $display_name;
        $this->code = $code;
    }

}

?>