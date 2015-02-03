<?php
namespace k4ml\postrack;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Parcel {
    public $tracking_no;

    public function __construct($tracking_no) {
        $this->tracking_no = $tracking_no;
    }

    public function check() {
        $client = new Client();
        $data = array(
            'body' => array('ParcelNo' => $this->tracking_no),
        );
        $resp = $client->post('http://www.pos.com.my/TrackAndTrace/viewDetailMelTrack/viewDetailMelTrack', $data);
        if ($resp->getStatusCode() == 200) {
            $html = (string) $resp->getBody();
            $crawler = new Crawler($html);
            $count = 0;
            $tmp_results = array();
            foreach ($crawler->filter('table.QueryTableDetails tr') as $tr) {
                $count++;
                if ($count == 1) {
                    continue;
                }
                $stage = array();
                foreach ($tr->childNodes as $td) {
                    $stage[] = $td->textContent;
                }
                $tmp_results[] = $stage;
            }
        }

        $results = array();
        foreach ($tmp_results as $row) {
            $results[] = $row[0] ." ". $row[2] ." ". $row[4];
        }
        return $results;
    }
}

