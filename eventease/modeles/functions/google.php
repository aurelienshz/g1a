<?php
function curlGoogleDecodeJson($url){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_ENCODING, "");
	$curlData = curl_exec($curl);
	curl_close($curl);
	return json_decode($curlData);
}

function googleCoordToAddress($lat,$long){
	$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&key=AIzaSyC02_hTBcl3SqHYTvraoftcwhPxkRSeCWA";
	$address = curlGoogleDecodeJson($url);
	return $address -> results[0] -> formatted_address;
}
function googleAddressToCoord($address){
	$address = preg_replace('/ /','+',$address);
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyC02_hTBcl3SqHYTvraoftcwhPxkRSeCWA";
	$coord = curlGoogleDecodeJson($url);
	$lat = $coord -> results[0] -> geometry -> location-> lat;
	$lng = $coord -> results[0] -> geometry -> location -> lng;
	return array($lat,$lng);
}
function googleCheckAddress($address){
	$test = googleAddressToCoord($address);
	if(is_float($test[0]) AND is_float($test[1]) ){
		return True;
	}else{
		return False;
	}
}