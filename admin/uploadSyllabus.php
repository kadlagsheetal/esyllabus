<?php
include('../config.php');
session_start();

if(isset($_SESSION['login_admin']))
{
    $sql = 'select * from students where s_id='.$_SESSION['login_admin'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $error = '';
    
    if (isset($_POST['submit'])) 
    {
        $sql_branch = 'select b_name from branch where b_id='.$_SESSION['bid'];
        $result_branch = $conn->query($sql_branch);
        $row_branch = $result_branch->fetch_assoc();
        
        $target_dir = "../Syllabus/".$row_branch['b_name']."/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if ($FileType != "pdf")
			$error = "Not a PDF File!";
        else if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        {
            header("location: syllabus.php");
            $path=substr($target_file, 12);
            //echo $path;
            $sql = "INSERT INTO syllabus (b_id,path) VALUES (".$_SESSION['bid']." ,'$path')";
            $conn->query($sql);
        }
        else
            $error ="File could not be uploaded!";
    }
    
    if (isset($_POST['back']))
        header("location: syllabus.php");
}
else
{
    header("location: login.php");
}
?>

<!Doctype html>
<html>
<head>
    <title>Upload Syllabus</title>
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

<form method="POST" enctype="multipart/form-data">
<table cellpadding="20px" align="center">

<tr style="font-size:20px;">
    <td>Choose File:</td>
    <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
</tr>  

<tr>
    <td colspan="2"><?php echo $error; ?></td>
</tr>
    
<tr>
    <th><button type="submit" class="btn" name="back">BACK</button></th>
    <td><button type="submit" class="btn" name="submit">UPLOAD</button></td>
</tr>

</table>
</form>
    
</div>   


</body>
</html>