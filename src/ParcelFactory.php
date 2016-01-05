<?php
namespace k4ml\postrack;

class ParcelFactory {
	
	public static function create($type, $tracking_no)
	{
		$className = __NAMESPACE__.'\Parcel\\'.ucfirst($type);
        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Missing format class.');
        }
        return new $className($tracking_no);
	}
}