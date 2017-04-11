<?php
include('../config.php');
session_start();

if(isset($_SESSION['login_supreme'])){
    $sql = 'select * from admin where a_id='.$_SESSION['login_supreme'];
    $result = $conn->query($sql);
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
    <title>Survey</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="shortcut icon" href="images/logo.ico" />
</head>
<body>
    <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <!--<li><a href="stuff.php">STUFF</a></li>-->
        <li><a href="news.php">NEWS</a></li>
        <li class="active"><a href="survey.php?bid=1">SURVEY</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
    </ul>

<div>
<div id="branches">
    <ul>
        <li><a href="survey.php?bid=1">INFORMATION TECHNOLOGY</a></li>
        <li><a href="survey.php?bid=2">COMPUTER</a></li>
        <li><a href="survey.php?bid=3">MECHANICAL</a></li>
        <li><a href="survey.php?bid=4">ELECTRONICS</a></li>
        <li><a href="survey.php?bid=5">ELECTRICAL</a></li>
    </ul>
</div>
    
<div id="surveyList">
<?php
$sem=1;
?>

<table cellpadding="10px">
    
<?php
while($sem<9)
{ ?>
    <tr style="font-weight: bold;"><td>Semester <?php echo $sem; ?></td></tr>
<?php
    $sql_sub="select * from subjects where sem=".$sem." and b_id=".$_GET['bid'];
    $result_sub = $conn->query($sql_sub);

    while($row_sub = $result_sub->fetch_assoc())
    {?>
    <tr>
        <td><?php echo $row_sub['sub_name']; ?> </td>
        <?php
        $i=0;
        $total=0;
        $sql_survey ="select * from survey where sub_id=".$row_sub['sub_id'];
        $result_survey = $conn->query($sql_survey);
     
        while($row_survey = $result_survey->fetch_assoc()) {
            $total=$total+ $row_survey['result'];   
            $i++;
        }
        if($i!=0)  { ?>
            <td><?php echo $total/$i; ?></td>
    </tr>
    <?php
        }
    }?>
    <tr><td></td></tr>
    <?php
    $sem++;
}
?>
    
</table>
</div>
</div>
    
    
</body>
</html>