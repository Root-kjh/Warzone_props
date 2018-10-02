<?php
session_start();
if(!isset($_SESSION['3id'])){
    include 'start.php';
    die;
}
else if($_SESSION['3id']=='root'){
    if($_SERVER['REMOTE_ADDR']!='222.110.147.53'){
        echo "<script> alert('ip가 다릅니다!!.'); ";
        session_destroy();
        echo "<script> location.href='index.php';</script>";
        die;
    }else{
        echo "FLAG{M4k1nG_F14g_1S_s0_h4rD...}";
    }
}else{
    include 'home.php';
}
?>
