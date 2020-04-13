<?php

function addElective($title, $description, $lecturer){

	$host = "localhost";
	$db = "db_name";
	$username = "root";
	$pass = "";

	$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $username, $pass);

	$sql = "INSERT INTO electives (title, description, lecturer)
			VALUES 
			( :title, :description, :lecturer)";

	$stmt = $conn->prepare($sql) or die("failed!");
	$stmt->execute(['title' => $title, 'description' => $description, 'lecturer' => $lecturer]);
}

?>