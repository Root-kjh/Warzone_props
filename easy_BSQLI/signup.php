<?php
include 'config.php';
$id=$_POST['id'];
$pw=$_POST['pw'];
$pwr=$_POST['pwr'];

if($pw!=$pwr || !isset($_POST['id'],$_POST['pw'],$_POST['pwr']) ||
preg_match('/or|and|prob|_|\.|\(\)/i', $_POST['id']) || preg_match('/or|and|prob|_|\.|\(\)/i', $_POST['pw'])){
    echo "<script>alert('입력값이 올바르지 않습니다.');
            location.href='/easy_BSQLI';</script>";
    die;
    
}else{
    signup($id,$pw);
    echo "<script>alert('회원가입 성공.');
    location.href='/easy_BSQLI';</script>";
}
?>