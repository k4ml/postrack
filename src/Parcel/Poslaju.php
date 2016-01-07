<?php
namespace k4ml\postrack\Parcel;

use GuzzleHttp\Client as HttpClient;
use k4ml\postrack\Exceptions\WebCourierErrorException;
use k4ml\postrack\Exceptions\TrackingNotFoundException;

class Poslaju extends AbstractParcel {

    public function check() {

    	$client = new HttpClient;
        $resp = $client->get(sprintf('http://api.pos.com.my/v2TrackNTraceWebApi/api/Details/%s?sKey=7oHHMvxM0', 
            $this->tracking_no));

        if ($resp->getStatusCode() !== 200)
            throw new WebCourierErrorException;

        $body = json_decode($resp->getBody());

        if (! $body)
        	throw new TrackingNotFoundException;  	

        $result = array_map(function($data) {
        	return [
        		'time' => $data->date,
        		'location' => $data->office,
        		'status' => $data->process
        	];
        }, $body);

        return $result;
    }
}

