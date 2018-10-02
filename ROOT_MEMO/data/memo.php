<?php
include 'config.php';
$memo=$_POST['memo'];
$id=$_SESSION['prob7_id'];
$sid=$_SESSION['id'];

InsertMemo($id,$sid,$memo);
header("Location: ../memo.php");
?>