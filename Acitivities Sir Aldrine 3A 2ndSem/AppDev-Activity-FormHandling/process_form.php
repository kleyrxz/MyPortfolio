<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_handling";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$sql = "INSERT INTO information (`Name`, `Email`, `Message`) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Form submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
