<?php

$conn = new PDO('mysql:host=localhost;dbname=db_name', 'root', '');
$sql = "SELECT * FROM `table_name`";
$query = $conn->query($sql) or die("failed!");
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
 echo $row['id'];
 echo ", ";
}