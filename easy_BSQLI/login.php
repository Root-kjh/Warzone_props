<?php
include 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
$id=addslashes($id);
$pw=addslashes($pw);
if(!isset($_POST['id'],$_POST['pw'])){
    echo "<script>alert('입력값이 올바르지 않습니다.');
            location.href='/easy_BSQLI';</script>";
    die;
}else{
    login($id,$pw);
    echo "<script>alert('로그인 성공.');
    location.href='/easy_BSQLI';</script>";
}
?>