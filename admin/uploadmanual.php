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
        $i=1;
        $sub=$_POST['sub1'];
        $sql_subid="select sub_id from subjects where sub_name='$sub'";
        $result_subid = $conn->query($sql_subid);
        $row_subid = $result_subid->fetch_assoc();
        $id=$row_subid['sub_id']; 
        
        $target_dir = "../Manuals/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if (($FileType != "pptx") && ($FileType != "docx") && ($FileType != "pdf"))
			$error = "Not suitable File!";
        else if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        {
            header("location: lab-manual.php");
            $path=substr($target_file, 11);
            
            //echo $path;
            $sql = "INSERT INTO manual (sub_id,path) VALUES ('$id' ,'$path')";
            $conn->query($sql);
        }
        else
            $error ="File could not be uploaded!";
    }
    
    if (isset($_POST['back']))
        header("location: stuff.php");
}
else
{
    header("location: login.php");
}
?>

<!Doctype html>
<html>
<head>
    <title>Upload Manual</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/dropdown.css">
    <link rel="shortcut icon" href="images/logo.ico" />
    
          <style>
    .inv {
    display: none;
 
}
.one{     
   text-align: center;
    font-size: 14px; 
    font-weight: bold;
    color: #27a8e8; 
    margin-top:20px;
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
     margin-top: 10px;
}
.demo1 select.option2 {
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
     margin-top: 30px;
}

    
    </style>
    
</head>
<body>
    
    <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li class="active"><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li><a href="news.php">NEWS</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
    </ul>


<div class="block">

<form method="POST" enctype="multipart/form-data">
    
    
<div class="one">
    <label>Select Semester:</label>
    <div class="demo"><select name="sem1" id="semi" class="option3"></select></div>
    <div class="demo1"><select name="sub1" id="sebi" class="option2"></select></div>
</div> 
    
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


    
    
    
    
    
    
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
        $(document).ready(function()
                          {
          $.getJSON("sem.php",success=function(data)
            {
               var options="";
              for(var i=0;i<data.length;i++)
            {
             options += "<option value='" + data[i].toLowerCase() + "'>" + data[i] + "</option>";            
            }
           $("#semi").append(options);
          $("#semi").change();                      
             });            
            $("#semi").change(function()  
             {
              $.getJSON("sub.php?Sem=" + $(this).val(),success=function(data)
            {
               var options="";
              for(var i=0;i<data.length;i++)
            {
             options += "<option value='" + data[i] + "'>"  + data[i] + "</option>";            
            }
             $("#sebi").html("");
            $("#sebi").append(options);
               
             });            
              });                
        });             
            </script> 
</body>
</html>