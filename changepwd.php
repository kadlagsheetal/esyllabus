<?php
include('config.php');
session_start();

if(isset($_SESSION['login_user']))
{
    $sql = 'select * from students where s_id='.$_SESSION['login_user'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $error = '';
    
    if (isset($_POST['submit'])) 
    {
        if (empty($_POST['pwd']) || empty($_POST['pwd1']) || empty($_POST['pwd2'])) 
            $error = "Need to fill all the fields!";
        else
        {
            $pwd=$_POST['pwd'];
            $pwd1=$_POST['pwd1'];
            $pwd2=$_POST['pwd2'];
            if(($pwd1==$pwd2)&&($pwd==$row['password']))
            {
                $sql_update = "Update students set password = '$pwd1' where s_id=".$_SESSION['login_user']; 
                $conn->query($sql_update); 
                header("location: home.php");
            }
                
            else
            {
                $error = "Passwords do not match!";                   
            }
        }
    }
    
    if (isset($_POST['back']))
        header("location: home.php");
}
else
{
    header("location: login.php");
}
?>


<!Doctype html>
<html>
<head>
    <title>Change Password</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="shortcut icon" href="images/logo.ico" />
</head>
<body>
    <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li><a href="survey.php">SURVEY</a></li>
        <li><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li class="active"><a href="home.php">PROFILE</a></li>
    </ul>

<div class="tagline">
    Change Password
</div>
    
<div id="container">
    <div class="infofield">
    <form method="post">
    <table cellpadding="10px" cellspacing="10px">
        <tr>
            <th>Password:</th>
            <td><input type="password" name="pwd" placeholder="Password"></td>
        </tr>
        <tr>
            <th>New Password:</th>
            <td><input type="password" name="pwd1" placeholder="New Password"></td>
        </tr>
        <tr>
            <th>Confirm Password:</th>
            <td><input type="password" name="pwd2" placeholder="Confirm Password"></td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $error; ?></td>
        </tr>
        <tr>
            <th><button type="submit" class="btn" name="back">BACK</button></th>
            <td><button type="submit" class="btn" name="submit">SUBMIT</button></td>
        </tr>
    </table>
    </form>
    </div>
</div>
    
</body>
</html>