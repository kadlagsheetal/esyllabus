<?php
include('../config.php');
session_start();
if(isset($_SESSION['login_admin'])){
   
}
else
{
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title>University Question Papers</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="shortcut icon" href="images/logo.ico" />
        
            <style>
        .inv {
    display: none;
 
}
.demo select.option3 {
    width: 300px;
    margin: 0 auto;
    padding: 5px 5px;
    border-radius: 7px;    
    text-align: left;
    font-size: 14px; 
    font-weight: bold;
    color: #27a8e8; 
    border-width: 1px 1px 1px 1px;
    border-style: solid;
    border-color: #27a8e8;
    background: #fff;

}
        
        </style>    
</head>
   
    <body>        
         <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li class="active"><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li><a href="news.php">NEWS</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
    </ul>      
        
          
<form class="demo" id="demo">
    <select id="target" class="option3">
        <option value="">Select Semester...</option>
        <option value="content_1">Semester 1</option>
        <option value="content_2">Semester 2</option>
        <option value="content_3">Semester 3</option>
        <option value="content_4">Semester 4</option>
        <option value="content_5">Semester 5</option>
        <option value="content_6">Semester 6</option>
        <option value="content_7">Semester 7</option>
        <option value="content_8">Semester 8</option>
    <select>
</form>
    
<div id="content_1" class="inv">
<table cellpadding="20px" align="center">
<?php
$semi=1;
$sql_que = "select * from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
$i=1; 

while($row_que = $result_que->fetch_assoc())
{
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
<tr style="text-align:left;">
    <td style="font-size:20px;"><?php echo $i."."; ?></td>
    <td><a href="../UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path']; ?>" class="btn" download><?php echo $row_que['path']; ?></a></td>
    <td><a href="delete.php?data=que&id=<?php echo $row_que['q_id'];?>"><img src="images/delete.png"></a></td>
</tr>    
<?php  
$i++;
}
?>
</table>
</div>

<div id="content_2" class="inv">
<table cellpadding="20px" align="center">
<?php
$semi=2;
$sql_que = "select * from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
$i=1; 

while($row_que = $result_que->fetch_assoc())
{
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
<tr style="text-align:left;">
    <td style="font-size:20px;"><?php echo $i."."; ?></td>
    <td><a href="../UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path']; ?>" class="btn" download><?php echo $row_que['path']; ?></a></td>
    <td><a href="delete.php?data=que&id=<?php echo $row_que['q_id'];?>"><img src="images/delete.png"></a></td>
</tr>    
<?php  
$i++;
}
?>
</table>
</div>

            
<div id="content_3" class="inv">
<table cellpadding="20px" align="center">
<?php
$semi=3;
$sql_que = "select * from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
$i=1; 

while($row_que = $result_que->fetch_assoc())
{
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
<tr style="text-align:left;">
    <td style="font-size:20px;"><?php echo $i."."; ?></td>
    <td><a href="../UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path']; ?>" class="btn" download><?php echo $row_que['path']; ?></a></td>
    <td><a href="delete.php?data=que&id=<?php echo $row_que['q_id'];?>"><img src="images/delete.png"></a></td>
</tr>    
<?php  
$i++;
}
?>
</table>
</div>
            
<div id="content_4" class="inv">
<table cellpadding="20px" align="center">
<?php
$semi=4;
$sql_que = "select * from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
$i=1; 

while($row_que = $result_que->fetch_assoc())
{
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
<tr style="text-align:left;">
    <td style="font-size:20px;"><?php echo $i."."; ?></td>
    <td><a href="../UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path']; ?>" class="btn" download><?php echo $row_que['path']; ?></a></td>
    <td><a href="delete.php?data=que&id=<?php echo $row_que['q_id'];?>"><img src="images/delete.png"></a></td>
</tr>    
<?php  
$i++;
}
?>
</table>
</div>
            
            
<div id="content_5" class="inv">
<table cellpadding="20px" align="center">
<?php
$semi=5;
$sql_que = "select * from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
$i=1; 

while($row_que = $result_que->fetch_assoc())
{
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
<tr style="text-align:left;">
    <td style="font-size:20px;"><?php echo $i."."; ?></td>
    <td><a href="../UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path']; ?>" class="btn" download><?php echo $row_que['path']; ?></a></td>
    <td><a href="delete.php?data=que&id=<?php echo $row_que['q_id'];?>"><img src="images/delete.png"></a></td>
</tr>    
<?php  
$i++;
}
?>
</table>
</div>
            
            
<div id="content_6" class="inv">
<table cellpadding="20px" align="center">
<?php
$semi=6;
$sql_que = "select * from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
$i=1; 

while($row_que = $result_que->fetch_assoc())
{
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
<tr style="text-align:left;">
    <td style="font-size:20px;"><?php echo $i."."; ?></td>
    <td><a href="../UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path']; ?>" class="btn" download><?php echo $row_que['path']; ?></a></td>
    <td><a href="delete.php?data=que&id=<?php echo $row_que['q_id'];?>"><img src="images/delete.png"></a></td>
</tr>    
<?php  
$i++;
}
?>
</table>
</div>
            
            
<div id="content_7" class="inv">
<table cellpadding="20px" align="center">
<?php
$semi=7;
$sql_que = "select * from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
$i=1; 

while($row_que = $result_que->fetch_assoc())
{
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
<tr style="text-align:left;">
    <td style="font-size:20px;"><?php echo $i."."; ?></td>
    <td><a href="../UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path']; ?>" class="btn" download><?php echo $row_que['path']; ?></a></td>
    <td><a href="delete.php?data=que&id=<?php echo $row_que['ppt_id'];?>"><img src="images/delete.png"></a></td>
</tr>    
<?php  
$i++;
}
?>
</table>
</div>
            
            
<div id="content_8" class="inv">
<table cellpadding="20px" align="center">
<?php
$semi=8;
$sql_que = "select * from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
$i=1; 

while($row_que = $result_que->fetch_assoc())
{
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
<tr style="text-align:left;">
    <td style="font-size:20px;"><?php echo $i."."; ?></td>
    <td><a href="../UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path']; ?>" class="btn" download><?php echo $row_que['path']; ?></a></td>
    <td><a href="delete.php?data=que&id=<?php echo $row_que['ppt_id'];?>"><img src="images/delete.png"></a></td>
</tr>    
<?php  
$i++;
}
?>
</table>
</div>

            
<script>
document
    .getElementById('target')
    .addEventListener('change', function () {
        'use strict';
        var vis = document.querySelector('.vis'),   
        target = document.getElementById(this.value);
        if (vis !== null) {vis.className = 'inv';}
        if (target !== null ) {target.className = 'vis';}});
</script>

</body>
</html>