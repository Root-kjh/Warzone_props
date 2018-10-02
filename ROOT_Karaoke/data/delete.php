<?php
include 'config.php';

$id=$_SESSION['prob9_id'];
$idx=$_GET['idx'];

Deletemy($id,$idx);
header("Location: ../my.php");
?>