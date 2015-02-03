<?php

namespace k4ml\postrack;

class Tracker {
    protected $parcels = array();

    public function __construct($parcels) {
        $this->parcels = $parcels;    
    }

    public function check() {
        $results = array();
        foreach ($this->parcels as $parcel) {
            $results[$parcel->tracking_no] = $parcel->check();
        }
        return $results;
    }
}
