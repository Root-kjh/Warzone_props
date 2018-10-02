<?php
include 'config.php';

$id=$_SESSION['prob7_id'];
$sid=$_SESSION['id'];
$idx=$_GET['idx'];

DeleteMemo($idx,$id,$sid);
header("Location: ../memo.php");
?>