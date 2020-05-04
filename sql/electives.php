<?php

include "validation.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];

$url = $_SERVER['REQUEST_URI'];
$id = basename($url);
$pattern = "/[0-9]+/";

if(empty($id)){
    die("You should have a number as a path param.");
}

if($requestMethod == "GET") {

    if(!preg_match($pattern, $id)) {
        die("Path parameter should be a number.");
    } 

    getById($id);
} elseif($requestMethod == "POST") {

    $valid = array();
    $errors = array();

    $logfile = fopen("logfile_update.txt", "w");

    $title = $_POST["title"];
    $lecturer = $_POST["lecturer"];
    $description = $_POST["description"];

    validate("title", MAX_LENGTH_SUBJECT, $title, $valid, $errors);
	validate("lecturer", MAX_LENGTH_LECTURER, $lecturer, $valid, $errors);
    validate("description", MAX_LENGTH_DESCR, $description, $valid, $errors);
    
    if(existsId($id)) {

        if(count($errors) == 0) {
            fwrite($logfile, "ID на предмет: " . $id . " \n");
	        fwrite($logfile, "Име на предмет: " . $title . " \n");
	        fwrite($logfile, "Име на преподавател: " . $lecturer . " \n");
	        fwrite($logfile, "Описание на предмет: " . $description . " \n");

            echo("ID на предмет: " . $id . "<br>");
	        echo("Име на предмет: " . $title . "<br>");
	        echo("Име на преподавател: " . $lecturer . "<br>");
	        echo("Описание на предмет: " . $description . "<br>");

	        updateElective($id, $title, $description, $lecturer);
        } else {
	        fwrite($logfile, "Errors:\n");
	        echo("Errors:\n");

	        foreach($errors as $err)
	        {
		        fwrite($logfile, $err."\n");
		        echo($err."<br>");
            }
        }
    } else {
        fwrite($logfile, "Id doesn't exist. \n");
        echo ("Id doesn't exist. \n");
    }
}
