<?php
namespace k4ml\postracker\tests;

use GuzzleHttp\Stream\Stream;

use k4ml\postrack\Parcel;

class ParcelTest extends \PHPUnit_Framework_TestCase {
    public function testCheckDelivered() {
        \Patchwork\replace('GuzzleHttp\Client::post', function($url, $data) {
            $resp = new \GuzzleHttp\Message\Response(200);
            $body = file_get_contents(dirname('__DIR__') . '/tests/poslaju.html');
            $resp->setBody(Stream::factory($body));
            return $resp;
        });

        $p = new Parcel('1415151');
        $results = $p->check();
        $this->assertEquals(strpos($results[0], 'Delivered'), 21);
        $this->assertEquals(strpos($results[10], 'PO SUNGAI KOYAN'), 45);
    }
}
