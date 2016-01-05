<?php
namespace k4ml\postrack\Parcel;

use Goutte\Client;
use k4ml\postrack\Exceptions\WebCourierErrorException;
use k4ml\postrack\Exceptions\TrackingNotFoundException;

class Nationwide extends AbstractParcel {

    public function check() {

    	$client = new Client;

        return true;
    }
}

