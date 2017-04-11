<?php
include('config.php');
session_start();  // Starting Session


if(isset($_SESSION['login_user'])){
header("location: home.php");
} 

else{
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid!";
    }
    else{
        // Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        //mysql_connect("sql207.byethost7.com", "b7_16384139", "Password@15") or die('save_failed');
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        $sql = "select * from students where password='$password' AND s_id='$username'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
            if ($result->num_rows == 1) {
                $sql_sem="select sem from students_profile where s_id=".$row['s_id'];
                $result_sem = $conn->query($sql_sem);
                $row_sem = $result_sem->fetch_assoc();
                $_SESSION['Sem']=$row_sem['sem'];
                $_SESSION['login_user']=$username; // Initializing Session
                $_SESSION['sid']=$row["s_id"];
                $_SESSION['bid']=$row["b_id"];
                header("location: home.php"); // Redirecting To Other Page
            } else {
                $error = "Username or Password is invalid!";
            }
    }
}
}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Students Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css"> <!--pemanggilan file css-->
</head>

<body>
    <div class="pageHeader"></div>
    <div id="login">
        <div class="loginHeader">
            Students Login
        </div>
        <div class="loginField">
            <form method="post">
                <table cellspacing="10" align="center">
                    <tr><th><input type="text" name="username" placeholder="Roll Number"></th></tr>
                    <tr><th><input type="password" name="password" placeholder="Password"></th></tr>
                    <tr><th><?php echo $error; ?></th></tr>
                    <tr><th><button type="submit" class="btn" name="submit">LOGIN</button></th></tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>