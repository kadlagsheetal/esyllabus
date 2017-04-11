<?php
include('config.php');
session_start();
$error = '';

if(isset($_SESSION['login_user'])){
    $sql = 'select * from students_profile where s_id='.$_SESSION['login_user'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sem=$row['sem'];  //fetch semester
    
    $sql_sub = "select * from subjects where b_id=".$_SESSION['bid']." AND sem=".$sem;
    $result_sub = $conn->query($sql_sub);

    if (isset($_POST['submit'])) {
        while($row_sub = $result_sub->fetch_assoc()){
            $subid=$row_sub['sub_id'];
            $sql_que = 'select * from enquiry';
            $result_que = $conn->query($sql_que);
            while($row_que = $result_que->fetch_assoc()){
                $queid = $row_que['q_id'];
                echo $subid."-".$queid."....";
                $result = $_POST[$subid."-".$queid];
                $sql = "Insert into survey (sub_id, q_id, result) VALUES ('$subid','$queid','$result')";
                $conn->query($sql); 
                $sql_update = "UPDATE students SET survey_status=1 where s_id=".$_SESSION['login_user'];
                $conn->query($sql_update); 
            }
        }
        header("location: home.php");
    }
    
    if (isset($_POST['back']))
        header("location: home.php");
}
else
{
    header("location: login.php");
}
?>


<!Doctype html>
<html>
<head>
    <title>Survey</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/dropdown.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="shortcut icon" href="images/logo.ico" />
</head>
    
<body>
    
    <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li class="active"><a href="survey.php">SURVEY</a></li>
        <li><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li><a href="home.php">PROFILE</a></li>
    </ul>

<?php
    $sql_status = "select survey_status from students where s_id=".$_SESSION['login_user'];
    $result_status = $conn->query($sql_status);
    $row_status = $result_status->fetch_assoc();
    if($row_status['survey_status']){ ?>
    <div style="font-size:44px; font-weight: 600;color:red; margin-top:50px;">
        <?php echo "Access Denied!"; ?> 
    </div>
<?php }
    

    else
    {
?>

<div class="block">

<table cellpadding="15px" align="center">
<form method="post">

    <?php
        $i=1;
        while($row_sub = $result_sub->fetch_assoc()){
            $subid=$row_sub['sub_id'];
    ?>
    
    <tr>
        <td colspan="6" style="Font-size:20px;"><?php echo $row_sub['sub_name']; ?></td>
    </tr>
    
    <?php
        $sql_que = 'select * from enquiry';
        $result_que = $conn->query($sql_que);
        $j=1;
        while($row_que = $result_que->fetch_assoc()){?>
        <tr style="width:auto;">
            <td style="text-align:left;Font-size:15px;"><?php echo $row_que['q_id'].". ".$row_que['question']; ?></td>   
            <td><input type="radio" name="<?php echo $subid."-".$row_que['q_id']; ?>" value="5">Excellent</td>
            <td><input type="radio" name="<?php echo $subid."-".$row_que['q_id']; ?>" value="4" checked="checked">Good</td>
            <td><input type="radio" name="<?php echo $subid."-".$row_que['q_id']; ?>" value="3">Moderate</td>
            <td><input type="radio" name="<?php echo $subid."-".$row_que['q_id']; ?>" value="2">Satisfactory </td>
            <td><input type="radio" name="<?php echo $subid."-".$row_que['q_id']; ?>" value="1">Poor</td>
        </tr>
    <?php
        $j++;
        }?>
    
        <tr><td></td></tr>
    
        <?php $i++; }?>
        <tr>
            <td class="6"><?php echo $error; ?></td>
        </tr>
        <tr>
            <th colspan="3"><button type="submit" class="btn" name="back">BACK</button></th>
            <td colspan="3"><button type="submit" class="btn" name="submit">SUBMIT</button></td>
        </tr>
</form>
</table>
</div>
    <?php }?>
    

</body>
</html>
    
