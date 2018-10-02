<?php
include 'config.php';
$lotto=$_POST['lotto'];
$id=$_SESSION['prob6_id'];
$sid=$_SESSION['id'];
if($_SESSION['prob6_point']<0){
    echo "<script>alert('포인트가 부족합니다!');location.href='../index.php';</script>";
    die;
}
$_SESSION['prob6_point']=$_SESSION['prob6_point']-100;
if(Lotto($id,$sid,$lotto)){
    echo "<script>alert('로또 당첨을 축하합니다!! \\n당첨금 50000이 증정되었습니다.');
            location.href='../index.php';</script>";
}else{
    echo "<script>alert('아쉽습니다...\\n한번더 질러보면 될지도...');
            location.href='../index.php';</script>";
}
?>