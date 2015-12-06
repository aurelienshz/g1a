<?php

function validateDateFormat($date, $format = 'Y-m-d H:i:s'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
function validatePastDate($date){
    $date = new DateTime($date);
    $now = new DateTime();

    if($date < $now) {
    	return True;
	}else{
		return False;
	}
}
function validateFutureDate($date){
    $date = new DateTime($date);
    $now = new DateTime();

    if($date >= $now) {
    	return True;
	}else{
		return False;
	}
}