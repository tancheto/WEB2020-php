<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
<a href="index.php"> Take me home, country roads ... </a> <br>
<?php
session_start();
if (!isset($_SESSION["email"])) {
    die("Only authenticated users are allowed");
}

include "db-connection.php";
$conn = openCon();

$email = $_SESSION["email"];

$sql = "SELECT * from person where email = :email;";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$result = $stmt->execute() or die("Failed to query from DB!");
$firstrow = $stmt->fetch(PDO::FETCH_ASSOC) or die ("User not found.");

if(strcmp($firstrow["role"], "admin") == 0) {
	$sqlAllUsers = "SELECT * from person;";

	$resultSet = $conn->prepare($sqlAllUsers) or die("Failed to query from DB!");
	$resultSet->execute();

	echo("The users in the system are: <br>");
	while ($row = $resultSet->fetch(PDO::FETCH_ASSOC)) {
    	echo $row['email'] . " " . $row['firstname'] . " " . $row['role'];
    	echo "<br>";
	}
}
?>
</body>
</html>
