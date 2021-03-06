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

$valid = array();
$errors = array();

$logfile = fopen("logfile.txt", "w");

if ($_POST) {
	$title = $_POST["title"];
	$lecturer = $_POST["lecturer"];
	$description = $_POST["description"];

	validate("title", MAX_LENGTH_SUBJECT, $title, $valid, $errors);
	validate("lecturer", MAX_LENGTH_LECTURER, $lecturer, $valid, $errors);
	validate("description", MAX_LENGTH_DESCR, $description, $valid, $errors);

if(count($errors) == 0)
{
	fwrite($logfile, "Име на предмет: " . $title . " \n");
	fwrite($logfile, "Име на преподавател: " . $lecturer . " \n");
	fwrite($logfile, "Описание на предмет: " . $description . " \n");

	echo("Име на предмет: " . $title . "<br>");
	echo("Име на преподавател: " . $lecturer . "<br>");
	echo("Описание на предмет: " . $description . "<br>");

	addElective($title, $description, $lecturer);
}

else
{
	fwrite($logfile, "Errors:\n");
	echo("Errors:\n");

	foreach($errors as $err)
	{
		fwrite($logfile, $err."\n");
		echo($err."<br>");
	}
}

}
?>