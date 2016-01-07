<?php
namespace k4ml\postrack\Parcel;

use Goutte\Client;
use k4ml\postrack\Exceptions\WebCourierErrorException;
use k4ml\postrack\Exceptions\TrackingNotFoundException;

class Abx extends AbstractParcel {

    public function check() {

    	$client = new Client;
    	$crawler = $client->request('GET', 'http://www.abxexpress.com.my');

    	$trackBtn = $crawler->selectButton('Track');
    	$form = $trackBtn->form();

    	$crawler = $client->submit($form, array('tairbillno' => $this->tracking_no));

    	return $crawler->html();
    }
}