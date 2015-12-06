<?php

function googleCoordToAddress($lat,$long){
	$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&key=AIzaSyC02_hTBcl3SqHYTvraoftcwhPxkRSeCWA";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_ENCODING, "");
	$curlData = curl_exec($curl);
	curl_close($curl);
	$address = json_decode($curlData);
	return $address -> results[0] -> formatted_address;
}