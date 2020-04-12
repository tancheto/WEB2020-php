<?php

include "./db-connection.php";

$logfile = fopen("logfile.txt", "w");

$valid = array();
$errors = array();

define("MAX_LENGTH_SUBJECT", 128);
define("MAX_LENGTH_LECTURER", 128);
define("MAX_LENGTH_DESCR", 1024);

if ($_POST) {
$title = $_POST["title"];
$lecturer = $_POST["lecturer"];
$description = $_POST["description"];

if (!$title) {
$errors["title"] = "Име на предмета е задължително поле.";
} elseif (strlen($title) > MAX_LENGTH_SUBJECT) {
$errors["title"] = "Името на предмета има максимална дължина " . MAX_LENGTH_SUBJECT . " символа.";
} else {
$valid["title"] = $title;
}

if (!$lecturer) {
$errors["lecturer"] = "Преподавател е задължително поле.";
} elseif (strlen($lecturer) > MAX_LENGTH_LECTURER) {
$errors["lecturer"] = "Преподавател има максимална дължина " . MAX_LENGTH_LECTURER . " символа.";
} else {
$valid["lecturer"] = $lecturer;
}

if (!$description) {
$errors["description"] = "Описание е задължително поле.";
} elseif (strlen($description) > MAX_LENGTH_DESCR) {
$errors["description"] = "Описание има максимална дължина " . MAX_LENGTH_DESCR . " символа.";
} else {
$valid["description"] = $description;
}

if(count($valid) == 3)
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