<?php
namespace k4ml\postrack\tests;

use k4ml\postrack\ParcelFactory;
use k4ml\postrack\Parcel\Poslaju;
use k4ml\postrack\Parcel\Abx;
use k4ml\postrack\Parcel\Nationwide;

class ParcelTest extends \PHPUnit_Framework_TestCase {

    public function parcelData()
    {
        return array(
            array('poslaju'),
            array('abx'),
            array('nationwide'),
        );
    }

    /**
     *  @dataProvider parcelData
     */

    public function testCreateParcel($type)
    {
        $parcel = ParcelFactory::create($type, '');
        $this->assertInstanceOf('\k4ml\postrack\Parcel\AbstractParcel', $parcel);
    }

    public function poslajuData()
    {
        return array(
            array('EH038290948MY', 'Item delivered to  MARIATU')
        );
    }

    /**
     *  @dataProvider poslajuData
     */

    public function testPoslaju($tracking_no, $expected)
    {
        $poslaju = new Poslaju($tracking_no);
        $result = $poslaju->check();
        $this->assertContains($expected, json_encode($result));
    }

    public function abxData()
    {
        return array(
            array('8070372892', 'SENT TO KJXC')
        );
    }

    /**
     *  @dataProvider abxData
     */

    public function testAbx($tracking_no, $expected)
    {
        $abx = new Abx($tracking_no);
        $result = $abx->check();
        $this->assertTrue(FALSE);
    }

    public function nationwideData()
    {
        return array(
            array('52292617', 'Delivered 07 Jan 2013 12:45')
        );
    }

    /**
     *  @dataProvider nationwideData
     */

    public function testNationwide($tracking_no, $expected)
    {
        $nationwide = new Nationwide($tracking_no);
        $result = $nationwide->check();
        $this->assertTrue(FALSE);
    }
}
