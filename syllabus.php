<?php
include('config.php');
session_start();
if(isset($_SESSION['login_user']))
{
}
else
{
    header("location: login.php");
}
?>


<!Doctype html>
<html>
<head>
    <title>Syllabus Copy</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/dropdown.css">
    <link rel="shortcut icon" href="images/logo.ico" />
</head>
<body>
    
    <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li><a href="survey.php">SURVEY</a></li>
        <li><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li class="active"><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li><a href="home.php">PROFILE</a></li>
    </ul>

    
    
<div>
    
<div class="tabDetails" style="width:80%;margin:auto;font-size:18px;text-align:justify;font-family:Consolas;">
    <p>
        Eager to know what you will learn in your university next semester? Or may be you wish to study exactly what's been prescribed by your University. Either way your hunt for the syllabi ends here - complete syllabus of all engineering years of your specific branch. 
    <strong>Go ahead, download it.</strong>    
    </p>
</div>
    
<div class="buttonPdf">
    <table cellpadding="20px" align="center">
<?php
    $sem=1;
    $sql = 'select path from syllabus where b_id='.$_SESSION['bid'];
    $result = $conn->query($sql);
    $i=1;

while($row = $result->fetch_assoc())
{
?>
    
        <tr>
            <td style="font-size:18px;"><?php echo $i."."; ?></td>
            <td><a href="Syllabus\<?php echo $row['path'] ?>" class="btn" download><?php echo $row['path'] ?></a></td>
        </tr>
    
<?php
    $i++;
}
?>
        </table>
</div>  
    
</div>
    


</body>
</html>
    
