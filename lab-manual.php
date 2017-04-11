<?php
include('config.php');
session_start();
if(isset($_SESSION['login_user'])){
   
}
else
{
    header("location: login.php");
}
?>


<!Doctype html>
<html>
<head>
    <title>Lab Manual</title>
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
     margin-top:10px;
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
     margin-top: 20px;
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
     margin-top: 20px;
}
    </style>
</head>
<body>
    <ul id="menu-bar">
        <li><a href="logout.php">LOGOUT</a></li>
        <li><a href="survey.php">SURVEY</a></li>
        <li class="active"><a href="lab-manual.php">LAB MANUAL</a></li>
        <li><a href="stuff.php">NOTES</a></li>
        <li><a href="questions.php">UNIVERSITY QUESTIONS</a> </li>
        <li><a href="syllabus.php">SYLLABUS COPY</a></li>
        <li><a href="home.php">PROFILE</a></li>
    </ul>
    
    
<div class="tabDetails" style="width:80%;margin:auto;font-size:18px;text-align:justify;font-family:Consolas;">
    <p>
        Perform your lab experiments wisely. Know the objectives of it. Know what tasks you have to perform. You will get them here as a lab manual.
        <strong>Go ahead, download it.</strong>    
    </p>
</div>
    
    

 <div class="one">
<form method="post">
    <div class="demo"><select name="sem1" id="semi" class="option3"><option value="0">Select Semester</option></select></div>
    <div class="demo1"><select name="sub1" id="sebi" class="option2"><option value="">Accordingly Select Subject</option></select></div>
    <table cellpadding="20px" align="center">
        <tr><td><button type="submit" class="btn" name="submit">View Available Manuals</button></td></tr>
    </table>
</form>
</div> 

<table cellpadding="20px" align="center">       
<?php
if (isset($_POST['submit'])) 
{
    //echo $_POST['sem1'];
    if($_POST['sem1']>$_SESSION['Sem']){?>
        <tr style="font-size:28px;color:red;"><td><?php echo "Access Denied!"; ?></td></tr>
<?php }
    else{
    $i=1;
    $sub=$_POST['sub1'];
    $sql_subid="select sub_id from subjects where sub_name='$sub'";
    $result_subid = $conn->query($sql_subid);
    $row_subid = $result_subid->fetch_assoc();
    $id=$row_subid['sub_id']; 
    $sql_ppt="select * from manual where sub_id='$id'";
    $result_ppt = $conn->query($sql_ppt);
    if($result_ppt->num_rows == 0)
    {?>
    <tr><td style="font-size:24px;"><?php echo "No file to show!" ?></td></tr>
<?php }
    else
    {
    while($row_ppt = $result_ppt->fetch_assoc()){
?>
    
    <tr>
        <td style="font-size:20px;"><?php echo $i."."; ?></td>
        <td><a href="Manuals/<?php echo $row_ppt['path']; ?>" class="btn" download><?php echo $row_ppt['path']; ?></a></td>
    </tr>
    
        <?php $i++;
    }
    }
    }
}
?>
</table>   
    
    
    
    
    
    
    
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