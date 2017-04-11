<?php

include('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject']; 
$message = $_POST['message'];

$sql = "Insert into query (name, email, subject, message) VALUES ('$name','$email','$subject','$message')";
$conn->query($sql); 

header("location: index.php");

?>