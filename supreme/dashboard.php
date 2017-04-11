<?php
include('../config.php');
session_start();

if(isset($_SESSION['login_supreme'])){
    $sql = 'select * from admin where a_id='.$_SESSION['login_supreme'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $error ="";
        if (isset($_POST['submit'])) {
        if(empty($_POST['headline']))
           $error = "Invalid entry!"; 
           else{
               $headline=$_POST['headline'];
               $branch = $_POST['check'];
               if(empty($branch)) {
                   $error = "You didn't select any branches.";
                }
               else{
                   $N = count($branch);
                   for($i=0; $i < $N; $i++){
                       //$branch[$i]
                        $sql_news = "INSERT INTO news (heading, b_id, sem) VALUES ('$headline','$branch[$i]',0)";
                        $conn->query($sql_news);
                   }
               //$sql_news = "INSERT INTO news (heading, b_id, sem) VALUES ('$headline',6,0)";
               //$conn->query($sql_news);
               
               //SMS Code
          /*   $ch = curl_init();
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
}
else
{
    header("location: index.php");
}
?>



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
        <!--<li><a href="stuff.php">STUFF</a></li>-->
        <li><a href="news.php">NEWS</a></li>
        <li><a href="survey.php?bid=1">SURVEY</a></li>
        <li class="active"><a href="dashboard.php">DASHBOARD</a></li>
    </ul>

<div id="container">
<div style="float:right;font-size:28px;">
    SURVEY?
    <a href="updatestatus.php?status=0"><img src="images/on.png"></a>
    <a href="updatestatus.php?status=1"><img src="images/off.png"></a>
</div>
            <form method="post">
                <table cellspacing="10" align="center">
                    <tr><th><input type="text" name="headline" placeholder="Any new news?"></th></tr>
                    <tr><td><input type="checkbox" id="selecctall" value="6"> <strong>Selecct All</strong></td></tr>
                    <tr><td><input class="checkbox1" type="checkbox" name="check[]" value="1"> Information Technology</td></tr>
                    <tr><td><input class="checkbox1" type="checkbox" name="check[]" value="2"> Computer</td></tr>
                    <tr><td><input class="checkbox1" type="checkbox" name="check[]" value="3"> Mechanical</td></tr>
                    <tr><td><input class="checkbox1" type="checkbox" name="check[]" value="4"> Electronics</td></tr>
                    <tr><td><input class="checkbox1" type="checkbox" name="check[]" value="5"> Electrical</td></tr>
                    <tr><th><?php echo $error; ?></th></tr>
                    <tr><th><button type="submit" name="submit" class="btn">UPDATE</button></th></tr>
                </table>
            </form>

    </div>

    


    
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
     $(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});   
</script> 
</body>
</html>