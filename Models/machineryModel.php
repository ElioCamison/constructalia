<?php


class MachineryModel extends Mysql {

    private $conn;

    private $id;
    private $code;
    private $name;
    private $machinery_type;
    private $total_amount;
    private $price_day;
    private $last_revision;
    private $ubication;
    private $family;
    private $available;


    public function __construct() {
        parent::__construct();
    }

}// fin clase MachineryModel