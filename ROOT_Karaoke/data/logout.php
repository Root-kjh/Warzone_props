<?php
session_start();
unset($_SESSION['prob9_id']);
setcookie("FLAG","", time()-3600,'/');
unset($_COOKIE['FLAG']);
header("Location: ../index.php");
?>