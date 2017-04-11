<?php
include('../config.php');
session_start();
if(isset($_SESSION['login_admin']))
{
    if($_GET['data']=="syl") //Syllabus delete
    {
        $sql = 'Delete from syllabus where s_id='.$_GET['id'];
        $conn->query($sql); 
        header("location: syllabus.php");
    }
    
        if($_GET['data']=="nws") //News delete
    {
        $sql = 'Delete from news where news_id='.$_GET['id'];
        $conn->query($sql); 
        header("location: news.php");
    }
    
        if($_GET['data']=="ppt") //News delete
    {
        $sql = 'Delete from ppts where ppt_id='.$_GET['id'];
        $conn->query($sql); 
        header("location: stuff.php");
    }
    
        if($_GET['data']=="mnl") //Manual delete
    {
        $sql = 'Delete from manual where manual_id='.$_GET['id'];
        $conn->query($sql); 
        header("location: lab-manual.php");
    }
        if($_GET['data']=="que") //Question paper delete
    {
        $sql = 'Delete from questions where q_id='.$_GET['id'];
        $conn->query($sql); 
        header("location: questions.php");
    }

}





else
{
    header("location: index.php");
}
?>