<?php

$serverName = "localhost";

$user = "root";

$pass = "";

$databaseName = "Act2";

$conn = new mysqli($serverName, $user, $pass, $databaseName);

if ($conn->connect_error) {

    die("Connection Failed: " .$conn->connect_error);
}

?>
