<?php
namespace k4ml\postrack\Parcel;

abstract class AbstractParcel {
	
	public $tracking_no;

	public function __construct($tracking_no)
	{
		$this->tracking_no = $tracking_no;
	}

	abstract public function check();
}