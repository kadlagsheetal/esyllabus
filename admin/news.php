<?php
include('../config.php');
session_start();

if(isset($_SESSION['login_admin'])){
    $sql = 'select * from admin where a_id='.$_SESSION['login_admin'];
    $result = $conn->query($sql);
    $error = "";
    $row = $result->fetch_assoc();
}
else
{
    header("location: index.php");
}
?>


<!Doctype html>
<html>
<head>
    <title>News</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="shortcut icon" href="images/logo.ico" />
</head>
<body>
    <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li class="active"><a href="news.php">NEWS</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
    </ul>




        
<div class="block">
    
<table cellpadding="20px" align="center" style="font-size:24px;">
    <tr>
        <td colspan="3" style="text-align:right;font-size:15px;"><a href="dashboard.php">New News?</a></td>
    </tr>
<?php
    $sem=1;
    $sql = 'select * from news where b_id=6 OR b_id='.$_SESSION['bid'];
    $result = $conn->query($sql);

$i=1;
while($row = $result->fetch_assoc())
{
?>
    
        <tr>
            <td style="font-size:20px;"><?php echo $i."."; ?></td>
            <td><?php echo $row['heading'] ?></a></td>
            <td><a href="delete.php?data=nws&id=<?php echo $row['news_id'];?>"><img src="images/delete.png"></a></td>
        </tr>
    
<?php
    $i++;
}
?>
</table>
    
</div>   
    
</body>
</html>