<?php
include 'config.php';
$idx=$_POST['idx'];
$title=$_POST['title'];
$id=$_SESSION['prob9_id'];
Editmy($id,$title,$idx);
header("Location: ../my.php");
?>