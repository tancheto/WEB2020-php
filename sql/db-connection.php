<?php

function addElective($title, $description, $lecturer) {

	try {
		$conn = makeConnection();

		$sql = "INSERT INTO electives (title, description, lecturer)
				VALUES 
				( :title, :description, :lecturer)";

		$stmt = $conn->prepare($sql) or die("failed!");
		$stmt->execute(['title' => $title, 'description' => $description, 'lecturer' => $lecturer]);
	}
	catch(PDOException $error) {
    	die($error->getMessage());
    }
}

function getById($id) {
	try {
		$conn = makeConnection();

		$sql = "SELECT * FROM electives WHERE id = :id";

		$stmt = $conn->prepare($sql) or die("Failed to prepare statement!");
		$stmt->bindParam(':id', $id);
		$result = $stmt->execute() or die("Failed to query from DB!");

		$elective = $stmt->fetch(PDO::FETCH_ASSOC) or die ("Elective not found.");

		echo ("Elective with id: " . $id . "<br>");
		echo ("Title: " . $elective["title"] . "<br>");
		echo ("Description: " . $elective["description"] . "<br>");
		echo ("Lecturer: " . $elective["lecturer"] . "<br>");
	}
	catch(PDOException $error) {
    	die($error->getMessage());
    }
}

function validateId($id) {
	try {
		$conn = makeConnection();

		$sql = "SELECT * FROM electives WHERE id = :id";

		$stmt = $conn->prepare($sql) or die("Failed to prepare statement!");
		$stmt->bindParam(':id', $id);
		$result = $stmt->execute() or die("Failed to query from DB!");
		$elective = $stmt->fetch(PDO::FETCH_ASSOC);

		return ! empty($elective);
	}
	catch(PDOException $error) {
    	die($error->getMessage());
    }
}

function updateElective($id, $title, $description, $lecturer) {
	try {
		$conn = makeConnection();

		$sql = "UPDATE electives SET title = :title, description = :description, lecturer = :lecturer WHERE id = :id";

		$stmt = $conn->prepare($sql) or die("Failed to prepare statement!");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':lecturer', $lecturer);

		$stmt->execute() or die("Failed to query from DB!");
	}
	catch(PDOException $error) {
    	die($error->getMessage());
    }
}

function makeConnection() {

	$host = "localhost";
	$db = "universitySystem";
	$username = "root";
	$pass = "";

	try {
		$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $username, $pass);
	}
	catch(PDOException $error) {
    	die($error->getMessage());
	}	
	return $conn;
}

?>