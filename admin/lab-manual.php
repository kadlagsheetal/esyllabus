<?php
include('../config.php');
session_start();
if(isset($_SESSION['login_admin']))
{

}
else
{
    header("location: index.php");
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

<div class="one">
    <table align="center" cellspacing="20px">
        <tr><td colspan="3" style="text-align:right;font-size:15px;"><a href="uploadmanual.php">Insert new Lab Manual?</a></td></tr>
    </table>
<form method="post">
    <label style="color:black;">Select Semester:</label>
    <div class="demo"><select name="sem1" id="semi" class="option3"><option value="0">Select Semester</option></select></div>
    <div class="demo1"><select name="sub1" id="sebi" class="option2"><option value="">Accordingly Select Subject</option></select></div>
    <table cellpadding="20px" align="center">
        <tr><td><button type="submit" class="btn" name="submit">View PPTs</button></td></tr>
    </table>
</form>
</div> 

<table cellpadding="20px" align="center">       
<?php
if (isset($_POST['submit'])) 
{
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
    while($row_ppt = $result_ppt->fetch_assoc())
{
?>
    
    <tr>
        <td style="font-size:20px;"><?php echo $i."."; ?></td>
        <td><a href="../Manuals/<?php echo $row_ppt['path']; ?>" class="btn" download><?php echo $row_ppt['path']; ?></a></td>
        <td><a href="delete.php?data=mnl&id=<?php echo $row_ppt['manual_id'];?>"><img src="images/delete.png"></a></td>
    </tr>
    
<?php
 $i++;
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