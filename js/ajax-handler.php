<?php

$jsonStr = file_get_contents('php://input');
$jsonArr = json_decode($jsonStr);
var_dump($jsonArr);

?>