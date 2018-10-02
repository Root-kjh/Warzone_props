<?php
include 'config.php';
$idx=$_POST['idx'];
$memo=$_POST['memo'];
$id=$_SESSION['prob7_id'];
$sid=$_SESSION['id'];
EditMemo($idx,$memo,$id,$sid);
header("Location: ../memo.php");
?>