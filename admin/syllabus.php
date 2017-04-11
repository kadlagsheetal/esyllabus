<?php
include('../config.php');
session_start();
if(isset($_SESSION['login_admin']))
{
}
else
{
    header("location: index.php");
}
?>


<!Doctype html>
<html>
<head>
    <title>Syllabus</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/dropdown.css">
    <link rel="shortcut icon" href="images/logo.ico" />
</head>
<body>
    
    <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li class="active"><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li><a href="news.php">NEWS</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
    </ul>

<div class="block">
    
<table cellpadding="20px" align="center">
    <tr>
        <td colspan="3" style="text-align:right;font-size:15px;"><a href="uploadSyllabus.php">Insert Syllabus Copy</a></td>
    </tr>
<?php
    $sem=1;
    $sql = 'select * from syllabus where b_id='.$_SESSION['bid'];
    $result = $conn->query($sql);

$i=1;
while($row = $result->fetch_assoc())
{
?>
    
        <tr>
            <td style="font-size:20px;"><?php echo $i."."; ?></td>
            <td><a href="../Syllabus/<?php echo $row['path'] ?>" class="btn" download><?php echo $row['path'] ?></a></td>
            <td><a href="delete.php?data=syl&id=<?php echo $row['s_id'];?>"><img src="images/delete.png"></a></td>
        </tr>
    
<?php
    $i++;
}
?>
</table>
    
</div>   


</body>
</html>
    