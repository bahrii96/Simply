<?php
require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;

function get_iso_code() {
	$reader = new Reader(__DIR__.'/vendor/GeoLite2-City.mmdb');
	$record = $reader->city(getIPAddress());
	$iso_code = strtolower($record->country->isoCode);
	if ($iso_code) {
		return $iso_code;
	} else {
		return '';
	}
}

function getIPAddress() {
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}