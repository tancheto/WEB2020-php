<?php

function addElective($title, $description, $lecturer){
	$conn = new PDO('mysql:host=localhost;dbname=db_name', 'root', '');
	$sql = "INSERT INTO electives (title, description, lecturer)
			VALUES 
			( :title, :description, :lecturer)";

	$stmt = $conn->prepare($sql) or die("failed!");
	$stmt->execute(['title' => $title, 
					'description' => $description, 
					'lecturer' => $lecturer]);
}

?>