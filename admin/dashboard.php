<?php
include('../config.php');
session_start();

if(isset($_SESSION['login_admin'])){
    $sql = 'select * from admin where a_id='.$_SESSION['login_admin'];
    $result = $conn->query($sql);
    $error = "";
    $row = $result->fetch_assoc();
    if (isset($_POST['submit'])) {
        if(empty($_POST['headline']) || $_POST['semi']<0 || $_POST['semi']>8)
           $error = "Invalid entry!"; 
           else{
               $headline=$_POST['headline'];
               $bid=$_SESSION['bid'];
               $sem=$_POST['semi'];
               $sql_news = "INSERT INTO news (heading, b_id, sem) VALUES ('$headline' ,'$bid', '$sem')";
               $conn->query($sql_news); 
               
               //SMS Code
              /* $ch = curl_init();
               $user="psgj.summer@gmail.com:Password@15";
               $receipientno="9819192183"; 
               $senderID="TEST SMS"; 
               $msgtxt=" ".$headline;   
               curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");  
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
               curl_setopt($ch, CURLOPT_POST, 1);
               curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
               $buffer = curl_exec($ch);
               if(empty ($buffer))
                { echo " buffer is empty "; }
               else
                { echo $buffer; } 
               curl_close($ch); */
               
               header("location: news.php");
           }
           }
}
else
{
    header("location: index.php");
}
?>


<!Doctype html>
<html>
<head>
    <title>Dashboard</title>
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
        <li><a href="news.php">NEWS</a></li>
        <li class="active"><a href="dashboard.php">DASHBOARD</a></li>
    </ul>

<div class="tagline">
    <img src="css/images/w.png">elcome...Prof. <?php echo $row['first_name']; ?>
</div>
    
<div id="container">
    <div class="infofield">
    <form method="post">
    <table cellpadding="10px" cellspacing="10px">
        <tr>
            <th>Name:</th>
            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
            <td style="width:150px;"></td>
            <td><input type="text" name="headline" placeholder="Any new news?"></td>
            <td><?php echo $error; ?></td>
        </tr>
        <tr>
            <th>Branch:</th>
            <td><?php 
                    $sql = 'select b_name from branch where b_id='.$_SESSION['bid'];
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['b_name'];    
                ?></td>
            <td style="width:150px;"></td>
            <td><input type="text" name="semi" placeholder="Semester? (Enter '0' for All Semesters)*"></td>
            <td><button type="submit" name="submit" class="btn">UPDATE</button></td>
        </tr>
    </table>
    </form>
    </div>


        

</div>
    
</body>
</html>