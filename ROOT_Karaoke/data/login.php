<?php
include 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
if(isset($id,$pw) && SelectDB($id,$pw)){
    header("Location: ../index.php");
    die;
}
header("Location: ../login.php")
?>