<?php

$logfile = fopen("logfile.txt", "w");

$valid = array();
$errors = array();

define("MAX_LENGTH_SUBJECT", 150);
define("MAX_LENGTH_LECTURER", 200);
define("MIN_LENGTH_DESCR", 10);

if ($_POST) {
$title = $_POST["title"];
$lecturer = $_POST["lecturer"];
$description = $_POST["description"];
$group = $_POST["group"];
$credits = $_POST["credits"];

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
} elseif (strlen($description) < MIN_LENGTH_DESCR) {
$errors["description"] = "Описание има минимална дължина " . MIN_LENGTH_DESCR . " символа.";
} else {
$valid["description"] = $description;
}

if (!$group) {
$errors["group"] = "Задължително трябва да изберете точно една група.";
}else{
$valid["group"] = $group;
}

if (!$credits) {
$errors["credits"] = "Кредити е задължително поле.";
} elseif ($credits < 0) {
$errors["credits"] = "Кредити е цяло положително число.";
} else {
$valid["credits"] = $credits;
}

if(count($valid) == 5)
{
	fwrite($logfile, "Име на предмет: " . $title . " \n");
	fwrite($logfile, "Име на преподавател: " . $lecturer . " \n");
	fwrite($logfile, "Описание на предмет: " . $description . " \n");
	fwrite($logfile, "Група: " . $group . " \n");
	fwrite($logfile, "Кредити: " . $credits . " \n");
}

else
{
	fwrite($logfile, "Errors:\n");
	foreach($errors as $err)
	{
		fwrite($logfile, $err."\n");
	}
}

}
?>