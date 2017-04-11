<?php
include('config.php');
session_start();

if(isset($_SESSION['login_user'])){
    $sql = 'select * from students_profile where s_id='.$_SESSION['login_user'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
else
{
    header("location: login.php");
}
?>


<!Doctype html>
<html>
<head>
    <title>Profile</title>
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
    <img src="images/w.png">elcome...<?php echo $row['first_name']; ?>
</div>
    
<div id="container">
    <div class="infofield">
    <table cellpadding="10px" cellspacing="10px">
        <tr>
            <th>Name:</th>
            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
        </tr>
        <tr>
            <th>Branch:</th>
            <td><?php 
                    $branch_sql = 'select b_name from branch where b_id='.$_SESSION['bid'];
                    $branch_result = $conn->query($branch_sql);
                    $branch_row = $branch_result->fetch_assoc();
                    echo $branch_row['b_name'];  
                ?></td>
        </tr>
        <tr>
            <th>Semester:</th>
            <td><?php echo $row['sem']; ?></td>
        </tr>
        <tr>
            <th>Mobile No:</th>
            <td><?php echo $row['mobileno']; ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo $row['email_id']; ?></td>
        </tr>
        <tr>
            <th>Password:</th>
            <td><a href="changepwd.php">Change Password?</td>
        </tr>
    </table>
    </div>
    <div class="newsupdates">
        <h1 style="text-align:left">NEWS:</h1> 
        <marquee direction="up" behavior="scroll" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
        <table cellpadding=10px align="center" style="font-size:24px;color:red;">
    <?php
        $sql_news = "select heading from news where (b_id=6 OR b_id=".$_SESSION['bid'].") AND (sem=0 or sem=".$_SESSION['Sem'].")";
        $result_news = $conn->query($sql_news);
        if ($result_news->num_rows != 0) {
            while($row_news = $result_news->fetch_assoc()) {?>
        <tr><td><?php echo $row_news['heading']; ?></td></tr>
                <?php }
        }
else {?>
    <tr><td><?php echo "No New News!" ?></td></tr>
<?php }?> </table>  </marquee> 
    </div>
</div>

</body>
</html>