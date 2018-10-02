<?php
include 'data/config.php';
$buy=$_GET['buy'];

switch ($buy) {
    case 'flag':
        buy_flag();
        break;
    
    case 'root':
        buy_root();
        break;

    default:
        echo "<script> alert('뭘 사려는지 모르겠군요...');location.href='index.php';</script>";
        break;
}
?>