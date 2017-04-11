<?php
include('../config.php');
session_start();

if(isset($_SESSION['login_supreme'])){
    
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
        <!--<li><a href="stuff.php">STUFF</a></li>-->
        <li class="active"><a href="news.php">NEWS</a></li>
        <li><a href="survey.php?bid=1">SURVEY</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
    </ul>




        
<div class="block">
    
<table cellpadding="20px" align="center" style="font-size:24px;">
    <tr>
        <td colspan="4" style="text-align:right;font-size:15px;"><a href="dashboard.php">New News?</a></td>
    </tr>
<?php
    $sql = 'select * from news';
    $result = $conn->query($sql);
    
    
    

$i=1;
while($row = $result->fetch_assoc())
{
    $sql_branch = "select * from branch where b_id=".$row['b_id'];
    $result_branch = $conn->query($sql_branch);
    $row_branch = $result_branch->fetch_assoc();
?>
    
        <tr>
            <td><?php echo $i."."; ?></td>
            <td><?php echo $row_branch['b_name']; ?></td>
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