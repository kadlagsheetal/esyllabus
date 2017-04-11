<?php
include('../config.php');
session_start();

if(isset($_SESSION['login_supreme'])){
$status=$_GET['status'];
$sql_update="Update students set survey_status='$status'";  
$conn->query($sql_update);
header("location: dashboard.php");
}
else
{
    header("location: index.php");
}
?>