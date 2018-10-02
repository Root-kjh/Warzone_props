<?php
session_start();
if(isset($_SESSION['prob9_id']))
include 'home.php';
else
include 'start.php';
?>