<?php

include('../config.php');

$query="select distinct sem from subjects";
$data=mysqli_query($conn,$query);

$subjects=array();

while($row=mysqli_fetch_array($data))
{
    array_push($subjects,$row["sem"]);
}

echo json_encode($subjects);

?>



