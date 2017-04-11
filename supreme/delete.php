<?php
include('../config.php');
session_start();
if(isset($_SESSION['login_supreme']))
{
    
        if($_GET['data']=="nws") //News delete
    {
        $sql = 'Delete from news where news_id='.$_GET['id'];
        $conn->query($sql); 
        header("location: news.php");
    }

}





else
{
    header("location: index.php");
}
?>