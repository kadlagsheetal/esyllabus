<?php
session_start();
if(isset($_GET["Sem"]))
{
include('../config.php');

if($_GET["Sem"]=="0")
    
   array_push($subjects,"According Select Subject"); 
    
else
{
$Sem=$_GET["Sem"];

$query="select sub_name from subjects where sem='$Sem' and b_id=".$_SESSION['bid'];
$data=mysqli_query($conn,$query);

$subjects=array();

while($row=mysqli_fetch_array($data))
{
    array_push($subjects,$row["sub_name"]);
}

echo json_encode($subjects);
}
}
?>



