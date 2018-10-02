<?php
session_start();
if(isset($_SESSION['3id'])){
    include 'home.php';
    die;
}else{
    include 'start.php';
    die;
}
?>