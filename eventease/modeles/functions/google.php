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
	if(!empty($coord -> results)) {
		$lat = $coord -> results[0] -> geometry -> location-> lat;
		$lng = $coord -> results[0] -> geometry -> location -> lng;
		return array($lat,$lng);
	}
	else {
		return False;
	}
}
function googleCorrectAddress($address) {
	$address = preg_replace('/ /','+',$address);
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyC02_hTBcl3SqHYTvraoftcwhPxkRSeCWA";
	$result = curlGoogleDecodeJson($url);
	if(!empty($coord -> results)) {
		return $result -> results[0] -> formatted_address;
	}
	else {
		return False;
	}
}

function googleCheckAddress($address){
	if($test = googleAddressToCoord($address)) {
		echo "DUMP DE TEST : ";
		var_dump($test);
		if(is_float($test[0]) AND is_float($test[1]) ){
			echo "Je rentre dans le 2e if";
			return True;
		}else{
			echo "Je rentre dans le else du 2e if";
			return False;
		}
	}
	else {
		echo "Je rentre dans le else du premier if";
		return False;
	}
}
