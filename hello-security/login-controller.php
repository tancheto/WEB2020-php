<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
<a href="index.php"> Take me home, country roads ... </a> <br>
<?php
include "db-connection.php";
$conn = openCon();

$email = htmlentities($_POST["email"]);
$password = htmlentities($_POST["password"]);

$sql = "SELECT * from person where email = :email";

//prepared statement - defence against SQL injection
$stmt = $conn->prepare($sql);

$stmt->bindParam(':email', $email);

$result = $stmt->execute() or die("Failed to query from DB!");

$firstrow = $stmt->fetch(PDO::FETCH_ASSOC) or die ("Not valid email or/and password.");

if (password_verify($password, $firstrow['password'])) {
	echo("Hello " . $firstrow['firstname'] . " you are now logged in.");
	session_start();
	$_SESSION["email"] = $firstrow['email'];
} else {
	die ("Not valid email or/and password.");
}

?>
</body>
</html>
