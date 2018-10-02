<?php
include 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
$sid=$_SESSION['id'];
if(isset($id,$pw,$sid) && SelectDB($id,$pw,$sid)){
    header("Location: ../index.php");
    die;
}
header("Location: ../login.php")
?>