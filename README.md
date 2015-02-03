## Quickstart

Add the following to `composer.json` in your project:-

    "require": {
        "k4ml/postrack": "@dev"
    },

Run `composer update`.

To test the included command line client:-

    php vendor/bin/tracker.php check <parcelNo>

Output should look like:-

<a href="http://imgur.com/LSIeEeK"><img src="http://i.imgur.com/LSIeEeK.png" title="postrack output" /></a>

To use the library in your application:-

```php
<?
use k4ml\postrack\Parcel;
$parcel = new Parcel('EM61871881MY');
print_r($parcel->check());
?>

## Todos
A lot can be done. Among others:-

* Plugin mechanism so we can add other courier as well.
* Add tests !
