<?php

include "./db-connection.php";

define("MAX_LENGTH_SUBJECT", 128);
define("MAX_LENGTH_LECTURER", 128);
define("MAX_LENGTH_DESCR", 1024);

function validate(String $key, int $maxLength, String $field, &$valid, &$errors) {

	if(!$field) {
		$errors[$key] = "Полето е задължително.";
	} elseif (strlen($field) > $maxLength) {
		$errors[$key] = "Полето има максимална дължина: " . $maxLength . " символа.";
	} else {
		$valid[$key] = $field;
	}
}
?>