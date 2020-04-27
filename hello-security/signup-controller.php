<?php
include "db-connection.php";

if (strcmp($_POST["role"], "teacher") == 0 || 
	strcmp($_POST["role"], "student") == 0) {

	$conn = openCon();
	
	//prepared statement - defence against SQL injection
	$stmt = $conn->prepare("INSERT INTO person (email, firstname, password, role) 
			VALUES (:email, :firstname, :password, :role)");

	$email = htmlentities($_POST["email"]);
	$firstname = htmlentities($_POST["firstname"]);
	$passHash = password_hash(htmlentities($_POST["password"]), PASSWORD_DEFAULT);
	$role = htmlentities($_POST["role"]);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':firstname', $firstname);
	$stmt->bindParam(':password', $passHash);
	$stmt->bindParam(':role', $role);

	$result = $stmt->execute() or die("Failed to query from DB!");

	echo("You are registered as: " . $_POST["email"] . " with role: " .  $_POST["role"]);
	echo ("<br>");
	echo("<a href='index.php'> Take me home, country roads ... </a>");
} else {
	echo("Error description: There is no such a role.");
}
?>