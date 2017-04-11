<?php
include('config.php');
session_start();
if(isset($_SESSION['login_user'])){
    $sql_branch="select * from branch where b_id=".$_SESSION['bid'];
    $result_branch= $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
}
else
{
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="shortcut icon" href="images/logo.ico" />
</head>
    <style>
.inv {
    display: none;
}
.one{
     border-radius: 7px;    
    text-align: center;
    font-size: 50px; 
    font-weight: bold;
    color: #27a8e8;
    margin-top:12px;
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
    <body>        
         <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li><a href="survey.php">SURVEY</a></li>
        <li><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li class="active"><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li><a href="home.php">PROFILE</a></li>
    </ul>        
        

<div class="tabDetails" style="width:80%;margin:auto;font-size:18px;text-align:justify;font-family:Consolas;">
    <p>
        If you haven't figured out already, we'll tell you - This is what you need to pass with better grades.
        The collection of previous engineering question papers from universities Mumbai University (MU) of your particular branch.
        <strong>Go ahead, download it.</strong>    
    </p>
</div>                

        
          
<form class="demo">
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
$i=1;
$semi=1;
$num=$_SESSION['Sem'];
 
if($semi>$num)
{ ?>   
<tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>

<?php }else{
$sql_que = "select path from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
while($row_que = $result_que->fetch_assoc()){ ?>
<tr>
    <td style="font-size:20px;"><?php echo $i."." ?></td>
    <td><a href="UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path'] ?>" class="btn" download><?php echo $row_que['path'] ?></a>
    </td>
</tr>    
<?php  
    $i++;
}
}
?>
</table>
</div>
            
            
<div id="content_2" class="inv">
<table cellpadding="20px" align="center">
<?php
$i=1;
$semi=2;
$num=$_SESSION['Sem'];
 
if($semi>$num)
{ ?>   
<tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>

<?php }else{
$sql_que = "select path from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
while($row_que = $result_que->fetch_assoc()){ ?>
<tr>
    <td style="font-size:20px;"><?php echo $i."." ?></td>
    <td><a href="UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path'] ?>" class="btn" download><?php echo $row_que['path'] ?></a>
    </td>
</tr>    
<?php  
    $i++;
}
}
?>
</table>
</div>
            
            
<div id="content_3" class="inv">
<table cellpadding="20px" align="center">
<?php
$i=1;
$semi=3;
$num=$_SESSION['Sem'];
 
if($semi>$num)
{ ?>   
<tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>

<?php }else{
$sql_que = "select path from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
while($row_que = $result_que->fetch_assoc()){ ?>
<tr>
    <td style="font-size:20px;"><?php echo $i."." ?></td>
    <td><a href="UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path'] ?>" class="btn" download><?php echo $row_que['path'] ?></a>
    </td>
</tr>    
<?php  
    $i++;
}
}
?>
</table>
</div>
            
            
<div id="content_4" class="inv">
<table cellpadding="20px" align="center">
<?php
$i=1;
$semi=4;
$num=$_SESSION['Sem'];
 
if($semi>$num)
{ ?>   
<tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>

<?php }else{
$sql_que = "select path from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
while($row_que = $result_que->fetch_assoc()){ ?>
<tr>
    <td style="font-size:20px;"><?php echo $i."." ?></td>
    <td><a href="UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path'] ?>" class="btn" download><?php echo $row_que['path'] ?></a>
    </td>
</tr>    
<?php  
    $i++;
}
}
?>
</table>
</div>
            
            
<div id="content_5" class="inv">
<table cellpadding="20px" align="center">
<?php
$i=1;
$semi=5;
$num=$_SESSION['Sem'];
 
if($semi>$num)
{ ?>   
<tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>

<?php }else{
$sql_que = "select path from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
while($row_que = $result_que->fetch_assoc()){ ?>
<tr>
    <td style="font-size:20px;"><?php echo $i."." ?></td>
    <td><a href="UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path'] ?>" class="btn" download><?php echo $row_que['path'] ?></a>
    </td>
</tr>    
<?php  
    $i++;
}
}
?>
</table>
</div>
            
            
<div id="content_6" class="inv">
<table cellpadding="20px" align="center">
<?php
$i=1;
$semi=6;
$num=$_SESSION['Sem'];
 
if($semi>$num)
{ ?>   
<tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>

<?php }else{
$sql_que = "select path from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
while($row_que = $result_que->fetch_assoc()){ ?>
<tr>
    <td style="font-size:20px;"><?php echo $i."." ?></td>
    <td><a href="UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path'] ?>" class="btn" download><?php echo $row_que['path'] ?></a>
    </td>
</tr>    
<?php  
    $i++;
}
}
?>
</table>
</div>
            
            
<div id="content_7" class="inv">
<table cellpadding="20px" align="center">
<?php
$i=1;
$semi=7;
$num=$_SESSION['Sem'];
 
if($semi>$num)
{ ?>   
<tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>

<?php }else{
$sql_que = "select path from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
while($row_que = $result_que->fetch_assoc()){ ?>
<tr>
    <td style="font-size:20px;"><?php echo $i."." ?></td>
    <td><a href="UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path'] ?>" class="btn" download><?php echo $row_que['path'] ?></a>
    </td>
</tr>    
<?php  
    $i++;
}
}
?>
</table>
</div>
            
            
<div id="content_8" class="inv">
<table cellpadding="20px" align="center">
<?php
$i=1;
$semi=8;
$num=$_SESSION['Sem'];
 
if($semi>$num)
{ ?>   
<tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>

<?php }else{
$sql_que = "select path from questions where b_id=".$_SESSION['bid']." and sem=".$semi;
$result_que= $conn->query($sql_que);
while($row_que = $result_que->fetch_assoc()){ ?>
<tr>
    <td style="font-size:20px;"><?php echo $i."." ?></td>
    <td><a href="UniversityQuestionPaper/<?php echo $row_branch['b_name']; ?>/<?php echo $row_que['path'] ?>" class="btn" download><?php echo $row_que['path'] ?></a>
    </td>
</tr>    
<?php  
    $i++;
}
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