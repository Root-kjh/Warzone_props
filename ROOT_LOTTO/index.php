<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>alert('warzone에서 로그인 하셔야 합니다!');</script>";
    die;
}
if(isset($_SESSION['prob6_id']))
include 'home.php';
else
include 'start.php';
?>