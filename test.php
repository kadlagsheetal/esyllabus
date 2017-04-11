<?php

include('config.php');

/* WORKING
$fname = "Sheetal";
$lastname = "Kadlag";
$email = "kadlag.sheetal@gmail.com";
$sql = "INSERT INTO students_profile (s_id, first_name, last_name, b_id, sem, mobileno, email_id) VALUES (501370,'$fname' ,'$lastname', 1, 5, 9819192183, '$email')";
$conn->query($sql); 
*/

/*WORKING
$pssword="sheetal";
$password="501370"
$sql = 'select * from students where password='.$password.' AND s_id='.$username;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
*/
session_start(); 
$pwd1="hello";
echo $_SESSION['login_user'];
$sql = "Update students set password = '$pwd1' where s_id=".$_SESSION['login_user']; 
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

?>