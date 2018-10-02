<?php
session_start();
unset($_SESSION['prob6_id']);
unset($_SESSION['prob6_point']);
header("Location: ../index.php");
?>