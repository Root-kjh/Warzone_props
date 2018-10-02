<?php
include 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
if(!isset($_POST['id'],$_POST['pw'])){
    echo "<script>alert('입력값이 올바르지 않습니다.');
            location.href='/easy_sqlI3';</script>";
    die;
}else{
    login($id,$pw);
    if(isset($_SESSION['prob8_id']))
        echo "<script>alert('로그인 성공.');
        location.href='/easy_sqlI3';</script>";
    else
        echo "<script>alert('로그인 실패.');
        location.href='/easy_sqlI3/login.html';</script>";
}
?>